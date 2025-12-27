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
        $reports = Report::orderBy('created_at', 'desc')->paginate(10);

        // Calculate stats
        $stats = [
            'total' => Report::count(),
            'pending' => Report::where('status', 'pending')->count(),
            'assigned' => Report::where('status', 'assigned')->count(),
            'in_progress' => Report::where('status', 'in_progress')->count(),
            'completed' => Report::where('status', 'completed')->count(),
        ];

        return view('rescue-reports', compact('reports', 'stats'));
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

    // Update report status
    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,assigned,in_progress,completed',
        ]);

        $report->update(['status' => $validated['status']]);

        return redirect()
            ->route('rescue.dashboard')
            ->with('success', 'Report status updated successfully!');
    }
}
