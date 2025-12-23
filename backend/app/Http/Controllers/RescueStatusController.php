<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescue;

class RescueStatusController extends Controller
{
    public function viewStatus()
    {
        // Fetch all rescues, latest updated first
        $rescues = Rescue::orderBy('updated_at', 'desc')->get();

        // Return JSON for AJAX
        return response()->json($rescues);

        // If you want a Blade view instead:
        // return view('rescue.status', compact('rescues'));
    }
}
