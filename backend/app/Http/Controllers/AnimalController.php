<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // SHOW animals list page
    public function index()
{
    $animals = Animal::orderBy('created_at', 'desc')->paginate(8);

    // Calculate real stats
    $stats = [
        'total' => Animal::count(),
        'available' => Animal::where('status', 'Available')->count(),
        'medical' => Animal::where('status', 'In Treatment')->count(),
        'quarantine' => Animal::where('status', 'Quarantine')->count(),
    ];

    return view('rescue-animals', compact('animals', 'stats'));
}


    // SHOW add animal form page
    public function create()
    {
        return view('rescue.animals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/animals', $imageName);
            $data['image'] = 'animals/' . $imageName;
        }

        Animal::create($data);

        return redirect()
            ->route('rescue.animals')
            ->with('success', 'Animal added successfully');
    }

    /**
     * Show animal details
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('rescue.animals.show', compact('animal'));
    }

    /**
     * Show the form for editing an animal
     */
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('rescue.animals.edit', compact('animal'));
    }

    /**
     * Update an existing animal
     */
    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($animal->image && \Storage::exists('public/' . $animal->image)) {
                \Storage::delete('public/' . $animal->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/animals', $imageName);
            $data['image'] = 'animals/' . $imageName;
        }

        $animal->update($data);

        return redirect()
            ->route('rescue.animals')
            ->with('success', 'Animal updated successfully');
    }

    /**
     * Delete an animal
     */
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()
            ->route('rescue.animals')
            ->with('success', 'Animal deleted successfully');
    }
}
