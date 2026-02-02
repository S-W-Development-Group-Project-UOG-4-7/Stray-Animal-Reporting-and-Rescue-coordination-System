<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    public function index()
    {
        $vets = Veterinarian::latest()->get();
        return view('admin.veterinarians.index', compact('vets'));
    }

    public function create()
    {
        return view('admin.veterinarians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'clinic' => 'required|string|max:255',
            'phone'  => 'required|string|max:20',
            'status' => 'required',
        ]);

        Veterinarian::create($request->all());

        return redirect()
            ->route('admin.veterinarians.index')
            ->with('success', 'Veterinarian added successfully');
    }

    public function destroy(Veterinarian $veterinarian)
    {
        $veterinarian->delete();
        return back()->with('success', 'Veterinarian deleted');
    }
}
