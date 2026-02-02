<?php

namespace App\Http\Controllers\Vet;

use App\Http\Controllers\Controller;
use App\Models\AnimalHealthRecord;
use App\Models\Animal;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class AnimalRecordController extends Controller
{
    public function index()
    {
        $vet = auth()->user()->veterinarian;

        if (!$vet) {
             $records = AnimalHealthRecord::where('id', -1)->paginate(10);
        } else {
            $records = AnimalHealthRecord::with(['animal', 'veterinarian'])
                ->where('veterinarian_id', $vet->id)
                ->latest()
                ->paginate(10);
        }

        return view('vet.animal-records.index', compact('records'));
    }

    public function create()
    {
        $animals = Animal::orderBy('name')->get();
        return view('vet.animal-records.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'diagnosis' => 'required|string|max:255',
            'treatment' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $vet = auth()->user()->veterinarian;

        if (!$vet) {
             return back()->with('error', 'Veterinarian profile not linked to this user account.');
        }

        AnimalHealthRecord::create([
            'animal_id' => $request->animal_id,
            'veterinarian_id' => $vet->id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'notes' => $request->notes,
        ]);

        return redirect()->route('vet.animal-records.index')
            ->with('success', 'Health record created successfully.');
    }

    public function show($id)
    {
        $record = AnimalHealthRecord::with(['animal', 'veterinarian'])->findOrFail($id);
        return view('vet.animal-records.show', compact('record'));
    }
}
