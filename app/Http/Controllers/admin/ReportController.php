<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    // Show the reports list
    public function index()
    {
       $reports = Report::latest()->get(); // fetch all reports
    return view('admin_reports.reports', compact('reports'));
    }

    // Show the create report form
    public function create()
    {
        return view('admin_reports.create_report');
    }

    // Handle storing the report
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Save report to database
        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        // Redirect with success message
        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Report created successfully!');
    }
}
