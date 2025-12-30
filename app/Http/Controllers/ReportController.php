<?php

namespace App\Http\Controllers;

use App\Models\AnimalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    /**
     * Show the report form
     */
    public function showForm()
    {
        return view('reportanimal');
    }

    /**
     * Store a new animal report
     */
    public function store(Request $request)
    {
        Log::info('Form submission started', $request->all());
        
        try {
            // Validate the request
            $validated = $request->validate([
                'animal_type' => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
                'animal_photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
                'description' => 'required|string|min:3|max:1000',
                'location' => 'required|string|max:255',
                'last_seen' => 'required|date',
                'contact_name' => 'nullable|string|max:100',
                'contact_phone' => 'nullable|string|max:20',
                'contact_email' => 'nullable|email|max:100',
                'terms' => 'required|accepted'
            ]);

            Log::info('Validation passed', $validated);

            // Handle file upload
            if ($request->hasFile('animal_photo')) {
                $file = $request->file('animal_photo');
                
                // Clean up the filename
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                
                // Remove special characters and spaces
                $cleanName = preg_replace('/[^A-Za-z0-9\-]/', '', $originalName);
                $imageName = time() . '_' . $cleanName . '.' . $extension;
                
                Log::info('Uploading file', ['original' => $file->getClientOriginalName(), 'clean' => $imageName]);
                
                $file->move(public_path('uploads/animal_photos'), $imageName);
                $validated['animal_photo'] = 'uploads/animal_photos/' . $imageName;
            }

            // Format the date properly
            if (!empty($validated['last_seen'])) {
                $validated['last_seen'] = date('Y-m-d H:i:s', strtotime($validated['last_seen']));
            }

            // Generate report ID
            $validated['report_id'] = AnimalReport::generateReportId();
            $validated['status'] = 'pending';

            Log::info('Creating report', $validated);

            // Create the report
            $report = AnimalReport::create($validated);

            Log::info('Report created', ['id' => $report->id, 'report_id' => $report->report_id]);

            // Return success response with report details
            return response()->json([
                'success' => true,
                'message' => 'Report submitted successfully!',
                'report_id' => $report->report_id,
                'redirect_url' => route('report.success', $report->report_id)
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Error submitting report', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error submitting report: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show success page after report submission
     */
    public function success($reportId)
    {
        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();
        return view('report-success', compact('report'));
    }

    /**
     * Show delete confirmation page
     */
    public function showDeleteForm($reportId = null)
    {
        if ($reportId) {
            $report = AnimalReport::where('report_id', $reportId)->first();
            return view('delete-report', compact('report'));
        }
        return view('delete-report');
    }

    /**
     * Track and manage reports
     */
    public function trackReport($reportId = null)
    {
        if ($reportId) {
            $report = AnimalReport::where('report_id', $reportId)->first();
            return view('track-report', compact('report'));
        }
        return view('track-report');
    }

    /**
     * Delete a report
     */
    public function destroy(Request $request, $reportId)
    {
        try {
            // Find the report by report_id
            $report = AnimalReport::where('report_id', $reportId)->first();
            
            if (!$report) {
                return response()->json([
                    'success' => false,
                    'message' => 'Report not found with ID: ' . $reportId
                ], 404);
            }
            
            // Get the contact email from the request for verification
            $userEmail = $request->input('email');
            
            // Debug logging
            Log::info('Delete attempt', [
                'report_id' => $reportId,
                'user_email' => $userEmail,
                'report_email' => $report->contact_email
            ]);
            
            // Simple verification: check if email matches
            if ($report->contact_email && $report->contact_email !== $userEmail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email verification failed. Please use the email you provided when submitting the report.'
                ], 403);
            }
            
            // Delete the associated image file
            if ($report->animal_photo && file_exists(public_path($report->animal_photo))) {
                unlink(public_path($report->animal_photo));
            }
            
            // Delete the report (soft delete)
            $report->delete();
            
            Log::info('Report deleted', [
                'report_id' => $reportId,
                'deleted_at' => now()
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Report deleted successfully!'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error deleting report', [
                'report_id' => $reportId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete report: ' . $e->getMessage()
            ], 500);
        }
    }
}