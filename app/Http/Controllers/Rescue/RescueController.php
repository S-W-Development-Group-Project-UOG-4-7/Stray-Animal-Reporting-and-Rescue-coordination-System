<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rescue;

class RescueController extends Controller
{
    public function dashboard()
    {
        $rescues = Rescue::all();
        return response()->json($rescues);
    }

    public function store(Request $request)
    {
        $request->validate([
            'animal_type' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Rescue::create([
            'animal_type' => $request->animal_type,
            'condition' => $request->condition,
            'location' => $request->location,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('rescue.dashboard');
    }

    public function edit($id)
    {
        $rescue = Rescue::findOrFail($id);
        return view('rescue.edit', compact('rescue'));
    }

    public function update(Request $request, $id)
    {
        $rescue = Rescue::findOrFail($id);

        $request->validate([
            'animal_type' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $rescue->update($request->all());

        return redirect()->route('rescue.dashboard');
    }
}
