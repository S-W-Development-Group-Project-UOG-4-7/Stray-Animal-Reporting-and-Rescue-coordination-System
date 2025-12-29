<?php

namespace App\Http\Controllers;

use App\Models\AnimalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    // Show report form
    public function create()
    {
        return view('reportanimal');
    }

    // Store new report
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'animal_type' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'location' => 'required|string|max:500',
            'last_seen' => 'required|date',
            'animal_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'contact_name' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'terms' => 'required|accepted',
        ]);

        // Handle file upload
        $photoPath = null;
        if ($request->hasFile('animal_photo')) {
            // Store in 'animal-photos' folder as defined in your form
            $photoPath = $request->file('animal_photo')->store('animal-photos', 'public');
        }

        // Create report
        $report = AnimalReport::create([
            'report_id' => AnimalReport::generateReportId(),
            'animal_type' => $validated['animal_type'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'last_seen' => $validated['last_seen'],
            'animal_photo' => $photoPath,
            'contact_name' => $validated['contact_name'] ?? null,
            'contact_phone' => $validated['contact_phone'] ?? null,
            'contact_email' => $validated['contact_email'] ?? null,
            'status' => 'pending',           // Match your migration enum
            'is_active' => true,             // Set as active
            'expires_at' => now()->addDays(30),
            'admin_notes' => null,           // Initial admin notes
        ]);

        // Store report ID in session for easy access
        session(['last_report_id' => $report->report_id]);

        // Return JSON response for AJAX
        return response()->json([
            'success' => true,
            'report_id' => $report->report_id,
            'history_url' => route('reports.history'),
            'track_url' => route('track.report', $report->report_id),
            'message' => 'Report submitted successfully!'
        ]);
    }

    // Show all reports (history)
    public function history()
    {
        $reports = AnimalReport::orderBy('created_at', 'desc')->get();
        
        return view('reports-history', [
            'reports' => $reports,
            'total_reports' => $reports->count(),
            'active_reports' => $reports->where('is_active', true)->count(),
            'completed_reports' => $reports->where('status', 'rescue_completed')->count(),
        ]);
    }

    // Show tracking status for specific report
    public function track($id)
    {
        $report = AnimalReport::where('report_id', $id)->first();
        
        if (!$report) {
            return redirect()->route('reports.history')->with('error', 'Report not found');
        }
        
        return view('tracking-status', [
            'report' => $report,
            'error' => null
        ]);
    }

    // Update report status (for admin)
    public function updateStatus(Request $request, $id)
    {
        $report = AnimalReport::where('report_id', $id)->first();
        
        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Report not found'
            ], 404);
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,under_review,rescue_dispatched,rescue_completed,closed',
            'admin_notes' => 'nullable|string',
        ]);

        $report->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Report status updated successfully!'
        ]);
    }
}