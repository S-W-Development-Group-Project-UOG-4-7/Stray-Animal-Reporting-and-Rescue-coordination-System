<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\AnimalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalReportController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'animal_type'   => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
                'animal_photo'  => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
                'description'   => 'required|string|min:3|max:1000',
                'location'      => 'required|string|max:255',
                'last_seen'     => 'required|date',
                'contact_name'  => 'nullable|string|max:100',
                'contact_phone' => 'nullable|string|max:20',
                'contact_email' => 'nullable|email|max:100',
                'terms'         => 'required|accepted',
            ]);

            if ($request->hasFile('animal_photo')) {
                $file = $request->file('animal_photo');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/animal-photos', $imageName);
                $validated['animal_photo'] = 'storage/animal-photos/' . $imageName;
            }

            $validated['last_seen'] = date('Y-m-d H:i:s', strtotime($validated['last_seen']));
            $validated['report_id'] = AnimalReport::generateReportId();
            $validated['status']    = 'pending';
            $validated['expires_at'] = now()->addDays(30);

            $report = AnimalReport::create($validated);

            return response()->json([
                'success'      => true,
                'redirect_url' => route('report.success', $report->report_id),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    public function success($reportId)
    {
        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();
        return view('public.reports.report-success', compact('report'));
    }

    public function trackReport($reportId = null)
    {
        $report = null;
        if ($reportId) {
            $report = AnimalReport::where('report_id', $reportId)->first();
        }
        return view('public.reports.track-report', compact('report'));
    }

    public function trackStatus(Request $request)
    {
        $report = null;
        if ($request->has('report_id')) {
            $report = AnimalReport::where('report_id', $request->report_id)->first();
            if (!$report) {
                return redirect()->route('track.report')->with('error', 'Report not found');
            }
        }
        return view('public.reports.track-report', compact('report'));
    }

    public function myReports(Request $request)
    {
        $query = AnimalReport::query();

        if ($request->filled('report_id')) {
            $query->where('report_id', $request->report_id);
        }

        if ($request->filled('email')) {
            $query->where('contact_email', $request->email);
        }

        $reports = $query->latest()->paginate(10);

        return view('public.reports.my-reports', compact('reports'));
    }

    public function verifyEditEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'reportId' => 'required|string',
        ]);

        $report = AnimalReport::where('report_id', $request->reportId)
                    ->where('contact_email', $request->email)
                    ->first();

        if ($report) {
            session(['edit_email_' . $request->reportId => true]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Email does not match report']);
    }

    public function edit($reportId)
    {
        if (!session()->has('edit_email_' . $reportId)) {
            abort(403, 'Unauthorized access');
        }

        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();
        return view('public.reports.edit-report', compact('report'));
    }

    public function update(Request $request, $reportId)
    {
        try {
            if (!session()->has('edit_email_' . $reportId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email verification required',
                ], 403);
            }

            $report = AnimalReport::where('report_id', $reportId)->firstOrFail();

            $validated = $request->validate([
                'animal_type'   => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
                'animal_photo'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
                'description'   => 'required|string|min:3|max:1000',
                'location'      => 'required|string|max:255',
                'last_seen'     => 'required|date',
                'contact_name'  => 'nullable|string|max:100',
                'contact_phone' => 'nullable|string|max:20',
                'contact_email' => 'nullable|email|max:100',
            ]);

            if ($request->hasFile('animal_photo')) {
                if ($report->animal_photo) {
                    Storage::delete(str_replace('storage/', 'public/', $report->animal_photo));
                }
                $file = $request->file('animal_photo');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/animal-photos', $imageName);
                $validated['animal_photo'] = 'storage/animal-photos/' . $imageName;
            } else {
                $validated['animal_photo'] = $report->animal_photo;
            }

            $validated['last_seen'] = date('Y-m-d H:i:s', strtotime($validated['last_seen']));
            $report->update($validated);
            session()->forget('edit_email_' . $reportId);

            return response()->json([
                'success'      => true,
                'redirect_url' => route('track.report', $reportId),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->errors(),
            ], 422);
        }
    }

    public function showDeleteForm($reportId = null)
    {
        $report = null;
        if ($reportId) {
            $report = AnimalReport::where('report_id', $reportId)->first();
        }
        return view('public.reports.delete-report', compact('report'));
    }

    public function destroy(Request $request, $reportId)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $report = AnimalReport::where('report_id', $reportId)->firstOrFail();

        if ($report->contact_email !== $request->email) {
            return response()->json([
                'success' => false,
                'message' => 'Email verification failed',
            ], 403);
        }

        if ($report->animal_photo) {
            Storage::delete(str_replace('storage/', 'public/', $report->animal_photo));
        }

        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Report deleted successfully',
        ]);
    }
}
