<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimalReport;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'animal_type' => 'required|string',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'last_seen' => 'required|date',
            'animal_photo' => 'required|image|max:5120', // 5MB max
            'contact_name' => 'nullable|string|max:100',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:100',
        ]);

        // Generate report ID
        $reportId = 'SP-' . date('Y') . '-' . strtoupper(Str::random(8));

        // Handle file upload
        if ($request->hasFile('animal_photo')) {
            $path = $request->file('animal_photo')->store('animal_photos', 'public');
            $validated['animal_photo'] = $path;
        }

        // Add report ID and status
        $validated['report_id'] = $reportId;
        $validated['status'] = 'pending';

        // Store in database (create a model and migration first)
        // $report = AnimalReport::create($validated);

        // In a real app, you would save to database
        // For now, return JSON response for AJAX
        return response()->json([
            'success' => true,
            'report_id' => $reportId,
            'message' => 'Report submitted successfully!'
        ]);
    }

    public function track(Request $request)
    {
        $reportId = $request->query('id');
        
        // In real app, fetch from database
        // $report = AnimalReport::where('report_id', $reportId)->first();
        
        // For demo, return fake data
        return response()->json([
            'report_id' => $reportId,
            'animal_type' => 'Dog - Aggressive',
            'status' => 'in_progress',
            'location' => 'Central Park, New York',
            'last_seen' => now()->subHours(2),
            'updates' => [
                [
                    'title' => 'Report Received',
                    'description' => 'Your report has been received and assigned to our team',
                    'time' => now()->subHours(2),
                    'completed' => true
                ],
                [
                    'title' => 'Team Dispatched',
                    'description' => 'Rescue Team Alpha has been dispatched to the location',
                    'time' => now()->subHours(1),
                    'completed' => true
                ],
                [
                    'title' => 'Rescue in Progress',
                    'description' => 'Team is en route to the reported location',
                    'time' => now()->subMinutes(30),
                    'completed' => false
                ]
            ]
        ]);
    }

    public function show($id)
    {
        // Fetch report details
        // $report = AnimalReport::where('report_id', $id)->firstOrFail();
        // return view('report.show', compact('report'));
        
        // For demo
        return response()->json(['id' => $id]);
    }
}