<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function approveRequest($id)
    {
        // 1. Find the Request
        $request = AdoptionRequest::with('animal')->findOrFail($id);

        // 2. Approve the Request Application
        $request->update(['status' => 'Approved']);

        // 3. --- KEY FIX IS HERE ---
        // Update the ANIMAL status to 'Adopted'.
        // This removes it from the public list because AdoptionController 
        // only looks for 'Adoptable' pets.
        if ($request->animal) {
            $request->animal->update(['status' => 'Adopted']);
        }

        // 4. Cleanup: Reject other pending requests for the same animal
        AdoptionRequest::where('animal_id', $request->animal_id)
            ->where('id', '!=', $id)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        return back()->with('success', 'Request Approved! Animal has been removed from the adoption list.');
    }
}