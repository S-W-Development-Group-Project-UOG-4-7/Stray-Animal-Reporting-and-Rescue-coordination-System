<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnimalReport;

public function store(Request $request)
{
    $request->validate([
        'animal_type' => 'required|in:Aggressive,Sick/Injured,Stray/Lost,Abandoned',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    AnimalReport::create([
        'animal_type' => $request->animal_type,
        'location' => $request->location,
        'description' => $request->description,

        // 👇 AUTO STATUS
        'status' => 'pending',
    ]);

    return redirect()->back()->with('success', 'Report submitted');
}
