<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // must be logged in
    }

    // View Details
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }

    // Accept Assignment
    public function accept($id)
    {
        $report = Report::findOrFail($id);

        // ❌ prevent re-assigning
        if ($report->status !== 'pending') {
            return redirect()->back()
                ->with('error', 'This report is already assigned.');
        }

        $report->update([
            'status' => 'assigned',
            'assigned_to' => auth()->id(),
        ]);

        return redirect()->route('rescue.dashboard')
            ->with('success', 'Assignment accepted successfully');
    }
}
