<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    // ✅ add medical record form
    public function create(Pet $pet)
    {
        return view('vet.medical_records.create', compact('pet'));
    }

    // ✅ store medical record endpoint (Task 2.2 #2)
    public function store(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'symptoms' => ['required', 'string'],
            'diagnosis' => ['required', 'string'],
            'notes' => ['nullable', 'string', 'max:2000'],

            // ✅ prescriptions JSON input
            'prescription' => ['nullable', 'array'],
            'prescription.*.medicine' => ['required_with:prescription', 'string'],
            'prescription.*.dose' => ['required_with:prescription', 'string'],
            'prescription.*.duration' => ['required_with:prescription', 'string'],

            'attachment' => ['nullable', 'file', 'max:5120', 'mimes:jpg,jpeg,png,pdf'],
        ]);

        $path = null;
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('medical_records', 'public');
        }

        MedicalRecord::create([
            'pet_id' => $pet->id,
            'veterinarian_id' => Auth::id(),
            'symptoms' => $validated['symptoms'],
            'diagnosis' => $validated['diagnosis'],
            'notes' => $validated['notes'] ?? null,
            'prescription' => $validated['prescription'] ?? [],
            'attachment' => $path,
        ]);

        return redirect()
            ->route('vet.medical.history', $pet)
            ->with('success', 'Medical record added successfully.');
    }

    // ✅ fetch history by pet (Task 2.2 #3)
    public function history(Pet $pet)
    {
        $records = MedicalRecord::where('pet_id', $pet->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('vet.medical_records.history', compact('pet', 'records'));
    }
}
