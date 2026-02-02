<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use App\Models\AnimalReport;
use Illuminate\Http\Request;

class ReportAssignmentController extends Controller
{
    public function show($id)
    {
        $report = AnimalReport::findOrFail($id);
        return view('rescue.reports.show', compact('report'));
    }

    public function accept($id)
    {
        $report = AnimalReport::findOrFail($id);

        if ($report->status !== 'pending') {
            return redirect()->back()
                ->with('error', 'This report is already assigned.');
        }

        $report->update([
            'status' => 'assigned',
            'assigned_to' => auth()->id(),
            'assigned_at' => now(),
        ]);

        return redirect()->route('rescue.dashboard')
            ->with('success', 'Assignment accepted successfully');
    }
}
