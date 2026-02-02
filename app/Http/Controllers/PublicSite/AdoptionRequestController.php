<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AdoptionRequest;
use App\Models\RoleRequest;
use Illuminate\Http\Request;

class AdoptionRequestController extends Controller
{
    public function index()
    {
        $adoptionIds = session()->get('my_request_ids', []);
        $adoptionRequests = AdoptionRequest::whereIn('id', $adoptionIds)
                                ->with('animal')
                                ->latest()
                                ->get();

        $roleIds = session()->get('my_role_request_ids', []);
        $roleRequests = RoleRequest::whereIn('id', $roleIds)
                            ->latest()
                            ->get();

        return view('public.my-requests.index', compact('adoptionRequests', 'roleRequests'));
    }

    public function store(Request $request, Animal $animal)
    {
        $data = $request->validate([
            'full_name'    => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:150'],
            'phone'        => ['required', 'regex:/^(0)[0-9]{9}$/'],
            'nic'          => ['required', 'string', 'max:12'],
            'address'      => ['required', 'string', 'max:255'],
            'housing_type' => ['required', 'string'],
            'reason'       => ['required', 'string', 'min:10'],
            'age_confirmation'   => ['accepted'],
            'terms_confirmation' => ['accepted'],
        ], [
            'phone.regex' => 'Please enter a valid Sri Lankan phone number (e.g., 071XXXXXXX).',
            'age_confirmation.accepted' => 'You must be over 18 to adopt.',
            'terms_confirmation.accepted' => 'You must agree to the terms and conditions.',
        ]);

        $saveData = collect($data)->except(['age_confirmation', 'terms_confirmation'])->toArray();

        $saveData['has_fenced_yard'] = $request->has('has_fenced_yard');
        $saveData['has_other_pets']  = $request->has('has_other_pets');
        $saveData['has_children']    = $request->has('has_children');
        $saveData['animal_id']       = $animal->id;

        $adoptionRequest = AdoptionRequest::create($saveData);

        session()->push('my_request_ids', $adoptionRequest->id);

        return back()->with('success', 'Application submitted successfully!');
    }

    public function edit($id)
    {
        $myIds = session()->get('my_request_ids', []);
        if (!in_array($id, $myIds)) {
            abort(403, 'Unauthorized access to this request.');
        }

        $request = AdoptionRequest::findOrFail($id);

        if ($request->status !== 'Pending') {
            return back()->with('error', 'You cannot edit a request that has already been processed.');
        }

        return view('public.adoptions.edit', compact('request'));
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

        $ids = session()->get('my_request_ids', []);
        $ids = array_diff($ids, [$id]);
        session()->put('my_request_ids', $ids);

        return back()->with('success', 'Request cancelled and deleted.');
    }
}
