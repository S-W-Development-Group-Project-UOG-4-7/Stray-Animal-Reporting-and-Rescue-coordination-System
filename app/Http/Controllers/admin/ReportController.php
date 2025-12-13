<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Show the reports list
    public function index()
    {
        return view('admin_reports.reports'); // adjust your path
    }

    // Show the create report form
    public function create()
    {
        return view('admin_reports.create_report'); // your create form blade
    }

    // Handle storing the report
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Save the report (uncomment and adjust if you have a Report model)
        // Report::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ]);

        // Redirect back to reports list with success message
        return redirect()->route('admin.reports.index')
                         ->with('success', 'Report created successfully!');
    }
}
