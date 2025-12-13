<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    // Show the "New Assignment" form
    public function create()
    {
        return view('assignments.create');
    }

    // Store new assignment in DB
    public function store(Request $request)
    {
        $request->validate([
            'animal_name' => 'required',
            'description' => 'nullable'
        ]);

        Assignment::create([
            'user_id' => Auth::id(),
            'animal_name' => $request->animal_name,
            'description' => $request->description,
            'status' => 'accepted'
        ]);

        return redirect()->route('assignments.index')->with('success', 'Assignment accepted!');
    }

    // Optional: list all assignments
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }
}
