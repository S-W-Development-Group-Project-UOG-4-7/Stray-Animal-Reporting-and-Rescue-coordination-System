<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'housing_type' => 'required',
            'animal_id' => 'required',
            'previous_pet' => 'required',
            'adoption_reason' => 'required',
            'home_environment' => 'required',
            'terms' => 'required'
        ]);

        Adoption::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'housing_type' => $request->housing_type,
            'animal_id' => $request->animal_id,
            'previous_pet' => $request->previous_pet,
            'current_pets' => $request->current_pets,
            'adoption_reason' => $request->adoption_reason,
            'home_environment' => $request->home_environment,
            'vet_info' => $request->vet_info,
            'terms' => $request->terms ? 1 : 0,
            'newsletter' => $request->newsletter ? 1 : 0,
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
