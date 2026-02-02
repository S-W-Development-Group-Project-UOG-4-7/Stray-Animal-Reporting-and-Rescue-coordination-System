<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleRequestManagementController extends Controller
{
    public function index()
    {
        $roleRequests = RoleRequest::latest()->paginate(10);
        return view('admin.role-requests.index', compact('roleRequests'));
    }

    public function approve($id)
    {
        $roleRequest = RoleRequest::findOrFail($id);

        $roleMap = [
            'Volunteer' => 'general_user',
            'Veterinarian' => 'veterinarian',
            'Rescue Team' => 'rescue_team',
        ];

        User::create([
            'name' => $roleRequest->full_name,
            'username' => $roleRequest->username,
            'email' => $roleRequest->email,
            'password' => $roleRequest->password,
            'role' => $roleMap[$roleRequest->role_type] ?? 'general_user',
            'nic' => $roleRequest->nic,
            'phone' => $roleRequest->phone,
            'address' => $roleRequest->address,
        ]);

        $roleRequest->update(['status' => 'Approved']);

        return back()->with('success', 'Role request approved and user account created.');
    }

    public function reject($id)
    {
        $roleRequest = RoleRequest::findOrFail($id);
        $roleRequest->update(['status' => 'Rejected']);

        return back()->with('success', 'Role request rejected.');
    }
}
