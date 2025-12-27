<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Animal;

class AdoptionController extends Controller
{
    /**
     * Display a listing of adoption applications
     */
    public function index()
    {
        $adoptions = Adoption::with(['animal', 'assignedUser'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('rescue-adoptions', compact('adoptions'));
    }

    /**
     * Show the form for creating a new adoption application
     */
    public function create()
    {
        $availableAnimals = Animal::whereIn('status', ['Available', 'Rescued'])
            ->orderBy('name')
            ->get();

        return view('rescue.adoptions.create', compact('availableAnimals'));
    }

    /**
     * Store a newly created adoption application
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'applicant_name' => 'required|string|max:255',
            'applicant_email' => 'required|email|max:255',
            'applicant_phone' => 'required|string|max:255',
            'applicant_address' => 'required|string',
            'applicant_type' => 'required|string',
            'applicant_details' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Adoption::create($validated);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption application created successfully!');
    }

    /**
     * Display a single adoption record
     */
    public function show($id)
    {
        $adoption = Adoption::with(['animal', 'assignedUser'])->findOrFail($id);
        return view('rescue.adoptions.show', compact('adoption'));
    }

    /**
     * Approve a single adoption application
     */
    public function approve($id)
    {
        $adoption = Adoption::findOrFail($id);

        $adoption->update([
            'status' => 'Completed',
            'assigned_to' => auth()->id(),
        ]);

        // Update animal status to adopted
        $adoption->animal->update(['status' => 'Adopted']);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption approved successfully!');
    }

    /**
     * Approve multiple adoption applications
     */
    public function batchApprove(Request $request)
    {
        $adoptionIds = $request->input('adoption_ids', []);

        Adoption::whereIn('id', $adoptionIds)
            ->update([
                'status' => 'Completed',
                'assigned_to' => auth()->id(),
            ]);

        // Update corresponding animals
        $adoptions = Adoption::whereIn('id', $adoptionIds)->get();
        foreach ($adoptions as $adoption) {
            $adoption->animal->update(['status' => 'Adopted']);
        }

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', count($adoptionIds) . ' adoptions approved successfully!');
    }

    /**
     * Reject an adoption application
     */
    public function reject($id)
    {
        $adoption = Adoption::findOrFail($id);

        $adoption->update([
            'status' => 'Rejected',
            'assigned_to' => auth()->id(),
        ]);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption application rejected.');
    }

    /**
     * Update adoption status
     */
    public function updateStatus(Request $request, $id)
    {
        $adoption = Adoption::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        $adoption->update($validated);

        return redirect()
            ->route('rescue.adoptions')
            ->with('success', 'Adoption status updated successfully!');
    }
}
