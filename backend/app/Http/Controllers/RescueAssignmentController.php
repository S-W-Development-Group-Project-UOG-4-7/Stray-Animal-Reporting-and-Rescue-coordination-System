<?php

namespace App\Http\Controllers;

use App\Models\RescueAssignment;
use Illuminate\Http\Request;

class RescueAssignmentController extends Controller
{
    // Update rescue status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Assigned,En Route,Rescued,At Shelter',
        ]);

        $assignment = RescueAssignment::findOrFail($id);
        $assignment->status = $request->status;
        $assignment->save();

        return response()->json([
            'success' => true,
            'message' => 'Rescue status updated successfully.',
            'status' => $assignment->status
        ]);
    }
}
