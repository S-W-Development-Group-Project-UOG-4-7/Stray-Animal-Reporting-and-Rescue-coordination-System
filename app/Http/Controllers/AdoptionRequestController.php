<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AdoptionRequest;
use App\Models\RoleRequest;
use Illuminate\Http\Request;

class AdoptionRequestController extends Controller
{
    public function index()
    {
        // Fetch Adoptions from Session
        $adoptionIds = session()->get('my_request_ids', []);
        $adoptionRequests = AdoptionRequest::whereIn('id', $adoptionIds)
                                ->with('animal')
                                ->latest()
                                ->get();

        // Fetch Roles from Session
        $roleIds = session()->get('my_role_request_ids', []);
        $roleRequests = RoleRequest::whereIn('id', $roleIds)
                            ->latest()
                            ->get();

        return view('my-requests.index', compact('adoptionRequests', 'roleRequests'));
    }

    public function store(Request $request, Animal $animal)
    {
        $data = $request->validate([
            'full_name'    => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:150'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'address'      => ['required', 'string', 'max:255'],
            'housing_type' => ['required', 'string'],
            'reason'       => ['required', 'string', 'min:10'],
        ]);

        $data['has_fenced_yard'] = $request->has('has_fenced_yard');
        $data['has_other_pets']  = $request->has('has_other_pets');
        $data['has_children']    = $request->has('has_children');
        $data['animal_id'] = $animal->id;

        $adoptionRequest = AdoptionRequest::create($data);

        session()->push('my_request_ids', $adoptionRequest->id);

        return back()->with('success', 'Application submitted!');
    }

    // --- NEW EDIT/UPDATE/DELETE METHODS ---

    public function edit($id)
    {
        // 1. Security Check: Does user own this ID?
        $myIds = session()->get('my_request_ids', []);
        if (!in_array($id, $myIds)) {
            abort(403, 'Unauthorized access to this request.');
        }

        $request = AdoptionRequest::findOrFail($id);

        if ($request->status !== 'Pending') {
            return back()->with('error', 'You cannot edit a request that has already been processed.');
        }

        return view('adoptions.edit', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $adoptionRequest = AdoptionRequest::findOrFail($id);

        $data = $request->validate([
            'full_name'    => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:150'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'address'      => ['required', 'string', 'max:255'],
            'housing_type' => ['required', 'string'],
            'reason'       => ['required', 'string', 'min:10'],
        ]);

        $data['has_fenced_yard'] = $request->has('has_fenced_yard');
        $data['has_other_pets']  = $request->has('has_other_pets');
        $data['has_children']    = $request->has('has_children');

        $adoptionRequest->update($data);

        return redirect('/my-requests')->with('success', 'Adoption request updated successfully.');
    }

    public function destroy($id)
    {
        $adoptionRequest = AdoptionRequest::findOrFail($id);

        if ($adoptionRequest->status !== 'Pending') {
            return back()->with('error', 'Cannot delete a processed request.');
        }

        $adoptionRequest->delete();

        // Optional: Clean up session ID
        $ids = session()->get('my_request_ids', []);
        $ids = array_diff($ids, [$id]);
        session()->put('my_request_ids', $ids);

        return back()->with('success', 'Request cancelled and deleted.');
    }
}