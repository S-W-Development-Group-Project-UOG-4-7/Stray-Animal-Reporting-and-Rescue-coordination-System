<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    // Show all adoptable animals
    public function index()
    {
        $animals = Animal::where('is_adopted', false)->get();
        return view('adoption.index', compact('animals'));
    }

    // Show single animal
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('adoption.show', compact('animal'));
    }

    // Form for rescue teams to add animals
    public function create()
    {
        return view('adoption.create');
    }

    // Store new animal
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'species' => 'required|string',
            'condition' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max=2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('animals', 'public');
        }

        Animal::create($data);

        return redirect()->route('adoption.index')
            ->with('success', 'Animal added for adoption successfully.');
    }
}

