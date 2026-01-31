<?php

namespace App\Http\Controllers;

use App\Models\AnimalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store New Report with Google Maps Integration
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'animal_species'  => 'required|in:Dog,Cat,Other',
                'other_species'   => 'nullable|required_if:animal_species,Other|max:100',
                'animal_type'     => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
                'animal_photo'    => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
                'description'     => 'required|string|min:3|max:1000',
                'location'        => 'required|string|max:255',
                'latitude'        => 'nullable|numeric|between:-90,90',
                'longitude'       => 'nullable|numeric|between:-180,180',
                'formatted_address' => 'nullable|string|max:500',
                'place_id'        => 'nullable|string|max:255',
                'urgency'         => 'required|in:low,medium,high,emergency',
                'last_seen'       => 'required|date',
                'contact_name'    => 'nullable|string|max:100',
                'contact_phone'   => 'nullable|string|max:20',
                'contact_email'   => 'nullable|email|max:100',
                'terms'           => 'required|accepted',
            ]);

            // Upload image
            if ($request->hasFile('animal_photo')) {
                $file = $request->file('animal_photo');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/animal-photos', $imageName);
                $validated['animal_photo'] = 'storage/animal-photos/' . $imageName;
            }

            // Format dates
            $validated['last_seen'] = date('Y-m-d H:i:s', strtotime($validated['last_seen']));
            
            // Generate unique report ID
            $validated['report_id'] = AnimalReport::generateReportId();
            
            // Set default values
            $validated['status'] = 'pending';
            $validated['terms_accepted'] = true;
            $validated['expires_at'] = now()->addDays(30);

            // Clean up other_species if not "Other"
            if ($validated['animal_species'] !== 'Other') {
                $validated['other_species'] = null;
            }

            // Create the report
            $report = AnimalReport::create($validated);

            // Send emergency notification for urgent reports
            if ($validated['urgency'] === 'emergency') {
                $this->sendEmergencyNotification($report);
            }

            return response()->json([
                'success'      => true,
                'message'      => 'Report submitted successfully!',
                'report_id'    => $report->report_id,
                'redirect_url' => route('report.success', $report->report_id),
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Report Success Page
    |--------------------------------------------------------------------------
    */
    public function success($reportId)
    {
        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();
        return view('report-success', compact('report'));
    }

    /*
    |--------------------------------------------------------------------------
    | Track Report
    |--------------------------------------------------------------------------
    */
    public function trackReport($reportId = null)
    {
        $report = null;

        if ($reportId) {
            $report = AnimalReport::where('report_id', $reportId)->first();
        }

        return view('track-report', compact('report'));
    }

    /*
    |--------------------------------------------------------------------------
    | Track Status (with visual timeline)
    |--------------------------------------------------------------------------
    */
    public function trackStatus(Request $request)
    {
        $request->validate([
            'report_id' => 'required|string',
        ]);

        $report = AnimalReport::where('report_id', $request->report_id)->first();
        
        if (!$report) {
            return redirect()->route('track.report')->with('error', 'Report not found');
        }
        
        return view('track-report', compact('report'));
    }

    /*
    |--------------------------------------------------------------------------
    | My Reports (Search by Email)
    |--------------------------------------------------------------------------
    */
    public function myReports(Request $request)
    {
        $request->validate([
            'email' => 'required_without:report_id|email',
            'report_id' => 'required_without:email|string',
        ]);

        $query = AnimalReport::query();

        if ($request->filled('report_id')) {
            $query->where('report_id', $request->report_id);
        }

        if ($request->filled('email')) {
            $query->where('contact_email', $request->email);
        }

        $reports = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('my-reports', compact('reports'));
    }

    /*
    |--------------------------------------------------------------------------
    | Verify Email Before Edit
    |--------------------------------------------------------------------------
    */
    public function verifyEditEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'reportId' => 'required|string'
        ]);

        $report = AnimalReport::where('report_id', $request->reportId)
                    ->where('contact_email', $request->email)
                    ->first();

        if ($report) {
            // Store verification in session (expires in 1 hour)
            session(['edit_email_' . $request->reportId => [
                'verified' => true,
                'expires' => now()->addHour()
            ]]);

            return response()->json([
                'success' => true,
                'redirect_url' => route('report.edit', $request->reportId)
            ]);
        }

        return response()->json([
            'success' => false, 
            'message' => 'Email does not match this report'
        ], 422);
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Report Page
    |--------------------------------------------------------------------------
    */
    public function edit($reportId)
    {
        $sessionKey = 'edit_email_' . $reportId;
        
        if (!session()->has($sessionKey)) {
            return redirect()->route('report.verify', ['reportId' => $reportId])
                ->with('error', 'Please verify your email first');
        }

        // Check if verification expired
        $verification = session($sessionKey);
        if (now()->gt($verification['expires'])) {
            session()->forget($sessionKey);
            return redirect()->route('report.verify', ['reportId' => $reportId])
                ->with('error', 'Verification expired. Please verify again.');
        }

        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();
        return view('edit-report', compact('report'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Report
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $reportId)
    {
        try {
            $sessionKey = 'edit_email_' . $reportId;
            
            if (!session()->has($sessionKey)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email verification required',
                ], 403);
            }

            // Check if verification expired
            $verification = session($sessionKey);
            if (now()->gt($verification['expires'])) {
                session()->forget($sessionKey);
                return response()->json([
                    'success' => false,
                    'message' => 'Verification expired. Please verify again.',
                ], 403);
            }

            $report = AnimalReport::where('report_id', $reportId)->firstOrFail();

            $validated = $request->validate([
                'animal_species'  => 'required|in:Dog,Cat,Other',
                'other_species'   => 'nullable|required_if:animal_species,Other|max:100',
                'animal_type'     => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
                'animal_photo'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
                'description'     => 'required|string|min:3|max:1000',
                'location'        => 'required|string|max:255',
                'latitude'        => 'nullable|numeric|between:-90,90',
                'longitude'       => 'nullable|numeric|between:-180,180',
                'formatted_address' => 'nullable|string|max:500',
                'place_id'        => 'nullable|string|max:255',
                'urgency'         => 'required|in:low,medium,high,emergency',
                'last_seen'       => 'required|date',
                'contact_name'    => 'nullable|string|max:100',
                'contact_phone'   => 'nullable|string|max:20',
                'contact_email'   => 'nullable|email|max:100',
            ]);

            // Handle photo upload
            if ($request->hasFile('animal_photo')) {
                // Delete old photo if exists
                if ($report->animal_photo) {
                    Storage::delete(str_replace('storage/', 'public/', $report->animal_photo));
                }

                // Upload new photo
                $file = $request->file('animal_photo');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/animal-photos', $imageName);
                $validated['animal_photo'] = 'storage/animal-photos/' . $imageName;
            } else {
                $validated['animal_photo'] = $report->animal_photo;
            }

            // Format date
            $validated['last_seen'] = date('Y-m-d H:i:s', strtotime($validated['last_seen']));
            
            // Clean up other_species if not "Other"
            if ($validated['animal_species'] !== 'Other') {
                $validated['other_species'] = null;
            }

            // Update the report
            $report->update($validated);

            // Clear verification session
            session()->forget($sessionKey);

            return response()->json([
                'success'      => true,
                'message'      => 'Report updated successfully!',
                'redirect_url' => route('track.report', $reportId),
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Report (Show Page)
    |--------------------------------------------------------------------------
    */
    public function showDeleteForm($reportId = null)
    {
        return view('delete-report', compact('reportId'));
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Report (Action)
    |--------------------------------------------------------------------------
    */
    public function destroy(Request $request, $reportId)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();

        if ($report->contact_email !== $request->email) {
            return response()->json([
                'success' => false,
                'message' => 'Email verification failed',
            ], 403);
        }

        // Delete photo if exists
        if ($report->animal_photo) {
            Storage::delete(str_replace('storage/', 'public/', $report->animal_photo));
        }

        // Delete the report
        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Report deleted successfully',
            'redirect_url' => route('home'),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Private Helper Methods
    |--------------------------------------------------------------------------
    */
    
    /**
     * Send emergency notification for urgent reports
     */
    private function sendEmergencyNotification(AnimalReport $report)
    {
        // This would integrate with SMS/Email services
        // For now, we'll log the emergency
        \Log::emergency('Emergency animal report submitted', [
            'report_id' => $report->report_id,
            'urgency' => $report->urgency,
            'location' => $report->location,
            'latitude' => $report->latitude,
            'longitude' => $report->longitude,
            'formatted_address' => $report->formatted_address,
        ]);

        // TODO: Integrate with SMS gateway for emergency notifications
        // Example: Twilio, Nexmo, or custom SMS service
    }

    /**
     * Get nearby reports for map display
     */
    public function nearbyReports(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'radius' => 'nullable|numeric|min:1|max:50', // km
        ]);

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius ?? 5; // Default 5km radius

        // Use haversine formula to find nearby reports
        $reports = AnimalReport::selectRaw("
            *,
            (6371 * acos(
                cos(radians(?)) * 
                cos(radians(latitude)) * 
                cos(radians(longitude) - radians(?)) + 
                sin(radians(?)) * 
                sin(radians(latitude))
            )) AS distance
        ", [$latitude, $longitude, $latitude])
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->having('distance', '<', $radius)
        ->orderBy('distance')
        ->limit(50)
        ->get();

        return response()->json([
            'success' => true,
            'reports' => $reports->map(function ($report) {
                return [
                    'id' => $report->id,
                    'report_id' => $report->report_id,
                    'animal_species' => $report->animal_species,
                    'animal_type' => $report->animal_type,
                    'urgency' => $report->urgency,
                    'latitude' => $report->latitude,
                    'longitude' => $report->longitude,
                    'formatted_address' => $report->formatted_address,
                    'description' => $report->description,
                    'status' => $report->status,
                    'created_at' => $report->created_at->diffForHumans(),
                ];
            }),
        ]);
    }

    /**
     * Get report statistics for dashboard
     */
    public function statistics()
    {
        $stats = [
            'total_reports' => AnimalReport::count(),
            'pending_reports' => AnimalReport::where('status', 'pending')->count(),
            'emergency_reports' => AnimalReport::where('urgency', 'emergency')->count(),
            'active_reports' => AnimalReport::where('expires_at', '>', now())->count(),
            'reports_by_species' => AnimalReport::select('animal_species')
                ->selectRaw('count(*) as count')
                ->groupBy('animal_species')
                ->get(),
            'reports_by_urgency' => AnimalReport::select('urgency')
                ->selectRaw('count(*) as count')
                ->groupBy('urgency')
                ->get(),
            'recent_reports' => AnimalReport::with(['locationData'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get(),
        ];

        return response()->json([
            'success' => true,
            'statistics' => $stats,
        ]);
    }

    /**
     * Export reports as CSV
     */
    public function export(Request $request)
    {
        $request->validate([
            'format' => 'nullable|in:csv,json',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $query = AnimalReport::query();

        if ($request->filled('start_date')) {
            $query->where('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->where('created_at', '<=', $request->end_date . ' 23:59:59');
        }

        $reports = $query->get();

        if ($request->get('format', 'json') === 'csv') {
            return $this->exportAsCsv($reports);
        }

        return response()->json([
            'success' => true,
            'reports' => $reports,
        ]);
    }

    /**
     * Export reports as CSV file
     */
    private function exportAsCsv($reports)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="safepaws-reports-' . date('Y-m-d') . '.csv"',
        ];

        $callback = function() use ($reports) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, [
                'Report ID',
                'Species',
                'Condition',
                'Urgency',
                'Location',
                'Latitude',
                'Longitude',
                'Address',
                'Description',
                'Status',
                'Contact Name',
                'Contact Email',
                'Contact Phone',
                'Last Seen',
                'Created At',
                'Expires At',
            ]);

            // Add data rows
            foreach ($reports as $report) {
                fputcsv($file, [
                    $report->report_id,
                    $report->animal_species . ($report->other_species ? " ({$report->other_species})" : ''),
                    $report->animal_type,
                    $report->urgency,
                    $report->location,
                    $report->latitude,
                    $report->longitude,
                    $report->formatted_address,
                    $report->description,
                    $report->status,
                    $report->contact_name,
                    $report->contact_email,
                    $report->contact_phone,
                    $report->last_seen,
                    $report->created_at,
                    $report->expires_at,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}