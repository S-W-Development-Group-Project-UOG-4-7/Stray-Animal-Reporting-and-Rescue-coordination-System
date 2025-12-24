<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // SHOW animals list page
    public function index()
{
    $animals = Animal::all();
    return view('rescue-animals', compact('animals'));
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
        'status' => 'required'
    ]);

    Animal::create($request->all());

    return redirect()
        ->route('rescue.animals') // ✅ corrected route name
        ->with('success', 'Animal added successfully');

}
}
