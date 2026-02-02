<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnimalReport;

class ReportController extends Controller
{
    // Show all reports
    public function index()
    {
        $reports = AnimalReport::latest()->get();
        return view('admin.reports.reports', compact('reports'));
    }

    // Show create form
    public function create()
    {
        return view('admin.reports.create_report');
    }

    // Store new report (AUTO STATUS)
    public function store(Request $request)
    {
        $request->validate([
            'animal_type' => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // 1️⃣ Create report (only fillable fields)
        $report = AnimalReport::create([
            'animal_type' => $request->animal_type,
            'location'    => $request->location,
            'description' => $request->description,
        ]);

        // 2️⃣ AUTO status update (backend controlled)
        $report->status = 'pending';
        $report->save();

        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Report created successfully!');
    }

    // Show single report
    public function show(AnimalReport $report)
    {
        return view('admin.reports.show', compact('report'));
    }
}
