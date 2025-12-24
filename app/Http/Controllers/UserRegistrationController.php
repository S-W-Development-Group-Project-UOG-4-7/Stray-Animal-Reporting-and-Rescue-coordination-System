<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('users.register'); // direct Blade, not inside dashboard
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:vet,rescue',
            'nic' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nic' => $request->nic,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('users.create')->with('success', 'User registered successfully!');
    }
}
