<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

class AdoptionManagementController extends Controller
{
    public function approveRequest($id)
    {
        $request = AdoptionRequest::with('animal')->findOrFail($id);

        $request->update(['status' => 'Approved']);

        if ($request->animal) {
            $request->animal->update(['status' => 'Adopted']);
        }

        AdoptionRequest::where('animal_id', $request->animal_id)
            ->where('id', '!=', $id)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        return back()->with('success', 'Request Approved! Animal has been removed from the adoption list.');
    }
}
