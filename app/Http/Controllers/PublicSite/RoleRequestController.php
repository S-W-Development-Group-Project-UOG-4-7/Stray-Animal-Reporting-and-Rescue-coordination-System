<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleRequestController extends Controller
{
    public function create()
    {
        return view('public.role_requests.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'phone'     => ['required', 'string', 'max:20'],
            'address'   => ['required', 'string', 'max:255'],
            'nic'       => ['required', 'string', 'max:20'],
            'username'  => ['required', 'string', 'max:50', 'unique:users,username'],
            'password'  => ['required', 'string', 'min:6'],
            'role_type' => ['required', 'in:Volunteer,Veterinarian,Rescue Team'],
            'vet_id'    => ['nullable', 'required_if:role_type,Veterinarian', 'string', 'max:50'],
        ]);

        $data['password'] = Hash::make($data['password']);

        $roleRequest = RoleRequest::create($data);

        session()->push('my_role_request_ids', $roleRequest->id);

        return redirect('/my-requests')->with('success', 'Application submitted! You can track it here.');
    }

    public function edit($id)
    {
        $myIds = session()->get('my_role_request_ids', []);
        if (!in_array($id, $myIds)) {
            abort(403, 'Unauthorized');
        }

        $roleRequest = RoleRequest::findOrFail($id);

        if ($roleRequest->status !== 'Pending') {
            return back()->with('error', 'Cannot edit processed applications.');
        }

        return view('public.role_requests.edit', compact('roleRequest'));
    }

    public function update(Request $request, $id)
    {
        $roleRequest = RoleRequest::findOrFail($id);

        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255'],
            'phone'     => ['required', 'string', 'max:20'],
            'address'   => ['required', 'string', 'max:255'],
            'nic'       => ['required', 'string', 'max:20'],
        ]);

        $roleRequest->update($data);

        return redirect('/my-requests')->with('success', 'Application details updated.');
    }

    public function destroy($id)
    {
        $roleRequest = RoleRequest::findOrFail($id);

        if ($roleRequest->status !== 'Pending') {
            return back()->with('error', 'Cannot delete processed applications.');
        }

        $roleRequest->delete();

        $ids = session()->get('my_role_request_ids', []);
        $ids = array_diff($ids, [$id]);
        session()->put('my_role_request_ids', $ids);

        return back()->with('success', 'Application cancelled.');
    }
}
