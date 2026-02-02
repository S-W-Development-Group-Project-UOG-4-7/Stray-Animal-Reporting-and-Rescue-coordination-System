<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $donations = $query->latest()->paginate(15);

        $stats = [
            'total_amount' => Donation::sum('amount'),
            'total_count' => Donation::count(),
            'pending_count' => Donation::where('status', 'pending')->count(),
            'confirmed_count' => Donation::where('status', 'confirmed')->count(),
        ];

        return view('admin.donations.index', compact('donations', 'stats'));
    }

    public function updateStatus(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->status = $request->status;
        $donation->save();

        return redirect()->route('admin.donations.index')->with('success', 'Donation status updated.');
    }
}
