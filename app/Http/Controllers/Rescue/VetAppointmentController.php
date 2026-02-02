<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Veterinarian;
use App\Models\VetAppointment;
use Illuminate\Http\Request;

class VetAppointmentController extends Controller
{
    public function create($animalId)
    {
        $animal = Animal::findOrFail($animalId);
        $vets = Veterinarian::where('status', 'active')->get(); // Assuming 'active' status or just get all
        if($vets->isEmpty()){
             $vets = Veterinarian::all();
        }
        return view('rescue.vet.create', compact('animal', 'vets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'appointment_date' => 'required|date|after:now',
            'type' => 'required|in:Checkup,Surgery,Vaccination,Emergency,Other',
            'notes' => 'nullable|string',
        ]);

        VetAppointment::create([
            'animal_id' => $request->animal_id,
            'veterinarian_id' => $request->veterinarian_id,
            'appointment_date' => $request->appointment_date,
            'type' => $request->type,
            'notes' => $request->notes,
            'status' => 'scheduled',
        ]);

        return redirect()
            ->route('rescue.animals.show', $request->animal_id)
            ->with('success', 'Vet appointment scheduled successfully!');
    }
}
