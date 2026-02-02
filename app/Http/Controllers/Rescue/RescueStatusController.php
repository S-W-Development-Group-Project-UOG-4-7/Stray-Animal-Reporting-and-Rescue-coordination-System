<?php

namespace App\Http\Controllers\Rescue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rescue;

class RescueStatusController extends Controller
{
    public function viewStatus()
    {
        $rescues = Rescue::orderBy('updated_at', 'desc')->get();
        return response()->json($rescues);
    }
}
