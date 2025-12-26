<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\MedicalRecordFile;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicalRecordController extends Controller
{
    /**
     * Show medical history of a pet
     */
    public function history(Pet $pet)
    {
        $records = MedicalRecord::with(['files', 'vet'])
            ->where('pet_id', $pet->id)
            ->latest()
            ->paginate(10);

        return view('vet.medical.history', compact('pet', 'records'));
    }

    /**
     * Show create medical record form
     */
    public function create(Pet $pet)
    {
        return view('vet.medical.create', compact('pet'));
    }

    /**
     * Store medical record
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_id' => ['required', 'exists:pets,id'],
            'symptoms' => ['required', 'string', 'max:2000'],
            'diagnosis' => ['required', 'string', 'max:2000'],

            'prescription' => ['nullable', 'array'],
            'prescription.*.medicine' => ['nullable', 'string', 'max:255'],
            'prescription.*.dose' => ['nullable', 'string', 'max:255'],
            'prescription.*.duration' => ['nullable', 'string', 'max:255'],

            'notes' => ['nullable', 'string', 'max:2000'],

            'files' => ['nullable', 'array'],
            'files.*' => ['file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ]);

        /**
         * Vet ID (fallback for dev/testing)
         */
        $vetId = Auth::id() ?? (int) env('DEFAULT_VET_ID', 1);

        $record = MedicalRecord::create([
            'pet_id' => $validated['pet_id'],
            'vet_id' => $vetId,
            'symptoms' => $validated['symptoms'],
            'diagnosis' => $validated['diagnosis'],
            'prescription' => $validated['prescription'] ?? [],
            'notes' => $validated['notes'] ?? null,
        ]);

        /**
         * Save attached files
         */
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {

                $path = $file->store('medical_records', 'public');

                MedicalRecordFile::create([
                    'medical_record_id' => $record->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()
            ->route('vet.medical.history', $record->pet_id)
            ->with('success', 'Medical record added successfully!');
    }

    /**
     * Download medical record file
     */
    public function download(MedicalRecordFile $file)
    {
        return Storage::disk('public')->download(
            $file->file_path,
            $file->file_name
        );
    }
}
