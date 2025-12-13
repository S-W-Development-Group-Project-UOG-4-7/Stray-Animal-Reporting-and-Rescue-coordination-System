<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // List all reports
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    // Accept assignment for a report
    public function accept($id)
    {
        $report = Report::findOrFail($id);

        // Create a new assignment
        Assignment::create([
            'user_id' => Auth::id(),
            'report_id' => $report->id,
            'status' => 'accepted'
        ]);

        // Update report status
        $report->status = 'accepted';
        $report->save();

        return redirect()->back()->with('success', 'Assignment accepted!');
    }

    // View report details
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }
}
