<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

class AdoptionRequestController extends Controller
{
  public function store(Request $request, Animal $animal)
  {
    $data = $request->validate([
      'full_name' => ['required','string','max:120'],
      'email' => ['required','email','max:150'],
      'phone' => ['nullable','string','max:30'],
      'reason' => ['required','string','min:10'],
    ]);

    $data['animal_id'] = $animal->id;

    AdoptionRequest::create($data);

    return back()->with('success', 'Adoption request submitted! Status: Pending');
  }
}
