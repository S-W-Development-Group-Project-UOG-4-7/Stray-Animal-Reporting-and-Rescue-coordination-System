<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    // Show the donation form
    public function index()
    {
        return view('donation'); // Blade file: donate.blade.php
    }

    // Store donation (no login required)
    public function storeBank(Request $request)
    {
        // Validate input
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        // Save donation with session tracking
        $donation = Donation::create([
            'session_id'     => session()->getId(),
            'amount'         => $request->amount,
            'donor_name'     => $request->donor_name,
            'donor_email'    => $request->donor_email,
            'payment_method' => $request->payment_method,
            'status'         => 'pending',
        ]);

        return redirect()->route('donation-history')->with('success', 'Donation submitted successfully!');
    }

    // Donation history (session-based)
    public function history(Request $request)
    {
        $sessionId = session()->getId();

        $donations = Donation::where('session_id', $sessionId)
            ->when($request->donation_id, fn($query, $id) => $query->where('donation_id', 'like', "%$id%"))
            ->when($request->status, fn($query, $status) => $query->where('status', $status))
            ->when($request->payment_method, fn($query, $method) => $query->where('payment_method', $method))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('donation-history', compact('donations'));
    } // ✅ close history() method here

    // Edit donation
    public function edit($id)
    {
        $donation = Donation::where('id', $id)
            ->where('session_id', session()->getId())
            ->firstOrFail();

        return view('donation-edit', compact('donation'));
    }

    // Update donation
    public function update(Request $request, $id)
    {
        $donation = Donation::where('id', $id)
            ->where('session_id', session()->getId())
            ->firstOrFail();

        $request->validate([
            'amount' => 'required|numeric|min:1',
            'donor_name' => 'nullable|string',
            'donor_email' => 'nullable|email',
            'message' => 'nullable|string',
        ]);

        $donation->update($request->only([
            'amount',
            'donor_name',
            'donor_email',
            'message'
        ]));

       return redirect()->route('donation')
        ->with('success', 'Donation updated successfully!');
}
    // Delete donation
    public function destroy($id)
    {
        $donation = Donation::where('id', $id)
            ->where('session_id', session()->getId())
            ->firstOrFail();

        $donation->delete();

        return redirect()->route('donation-history')
            ->with('success', 'Donation deleted successfully');
    }
}
