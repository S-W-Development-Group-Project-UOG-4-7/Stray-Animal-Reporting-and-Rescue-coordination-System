<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdoptionRequest;
use App\Models\Animal;

class AdoptionController extends Controller
{
    public function index(Request $request)
    {
        $query = AdoptionRequest::with(['animal', 'assignedUser']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('animal_type')) {
            $query->whereHas('animal', function($q) use ($request) {
                $q->where('species', $request->animal_type); // assuming 'species' matches 'animal_type' filter values like 'dog', 'cat'
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('assigned_to')) {
            if ($request->assigned_to == 'unassigned') {
                $query->whereNull('assigned_to');
            } elseif ($request->assigned_to == 'me') {
                $query->where('assigned_to', auth()->id());
            }
            // Ignore other hardcoded values like 'john' for now as we don't have those IDs easily
        }

        $adoptions = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        $stats = [
            'pending' => AdoptionRequest::where('status', 'Pending')->count(),
            'homecheck' => AdoptionRequest::where('status', 'Home Check Scheduled')->count(),
            'ready' => AdoptionRequest::where('status', 'Approved')->count(),
            'completed_month' => AdoptionRequest::where('status', 'Completed')
                ->whereMonth('updated_at', now()->month)
                ->whereYear('updated_at', now()->year)
                ->count(),
            'total_completed' => AdoptionRequest::where('status', 'Completed')->count(),
        ];

        return view('rescue.adoptions', compact('adoptions', 'stats'));
    }

    public function create()
    {
        $availableAnimals = Animal::whereIn('status', ['Available', 'Rescued'])
            ->orderBy('name')
            ->get();

        return view('rescue.adoptions.create', compact('availableAnimals'));
    }

    public function store(Request $request)
    {
        // This method was for the internal 'Adoption' model. 
        // We can adapt it to create an 'AdoptionRequest' or leave it. 
        // For now, let's just create an AdoptionRequest with status 'Pending'.
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'applicant_name' => 'required|string|max:255',
            'applicant_email' => 'required|email|max:255',
            'applicant_phone' => 'required|string|max:255',
            'applicant_address' => 'required|string',
            'applicant_type' => 'required|string', // housing_type?
            'applicant_details' => 'nullable|string', // reason?
            'notes' => 'nullable|string',
        ]);

        AdoptionRequest::create([
            'animal_id' => $validated['animal_id'],
            'full_name' => $validated['applicant_name'],
            'email' => $validated['applicant_email'],
            'phone' => $validated['applicant_phone'],
            'address' => $validated['applicant_address'],
            'housing_type' => $validated['applicant_type'],
            'reason' => $validated['applicant_details'] ?? 'Internal Creation',
            'status' => 'Pending',
            'nic' => 'Internal', // Default for internal creation
            // other fields nullable
        ]);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption application created successfully!');
    }

    public function show($id)
    {
        $adoption = AdoptionRequest::with(['animal', 'assignedUser'])->findOrFail($id);
        return view('rescue.adoptions.show', compact('adoption'));
    }

    public function approve($id)
    {
        $adoption = AdoptionRequest::findOrFail($id);

        $adoption->update([
            'status' => 'Approved',
            'assigned_to' => auth()->id(),
        ]);

        if ($adoption->animal) {
            $adoption->animal->update(['status' => 'Adopted']);
        }

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption approved successfully!');
    }

    public function batchApprove(Request $request)
    {
        $adoptionIds = $request->input('adoption_ids', []);

        AdoptionRequest::whereIn('id', $adoptionIds)
            ->update([
                'status' => 'Approved',
                'assigned_to' => auth()->id(),
            ]);

        $adoptions = AdoptionRequest::whereIn('id', $adoptionIds)->get();
        foreach ($adoptions as $adoption) {
            if ($adoption->animal) {
                $adoption->animal->update(['status' => 'Adopted']);
            }
        }

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', count($adoptionIds) . ' adoptions approved successfully!');
    }

    public function reject($id)
    {
        $adoption = AdoptionRequest::findOrFail($id);

        $adoption->update([
            'status' => 'Rejected',
            'assigned_to' => auth()->id(),
        ]);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption application rejected.');
    }

    public function updateStatus(Request $request, $id)
    {
        $adoption = AdoptionRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        $adoption->update($validated);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption status updated successfully!');
    }
}
