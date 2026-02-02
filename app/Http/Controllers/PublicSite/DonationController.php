<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        return view('public.donations.donation');
    }

    public function storeBank(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        Donation::create([
            'session_id'     => session()->getId(),
            'amount'         => $request->amount,
            'donor_name'     => $request->donor_name,
            'donor_email'    => $request->donor_email,
            'payment_method' => $request->payment_method,
            'status'         => 'pending',
        ]);

        return redirect()->route('donation-history')->with('success', 'Donation submitted successfully!');
    }

    public function history(Request $request)
    {
        $sessionId = session()->getId();

        $donations = Donation::where('session_id', $sessionId)
            ->when($request->donation_id, fn($query, $id) => $query->where('id', 'like', "%$id%"))
            ->when($request->status, fn($query, $status) => $query->where('status', $status))
            ->when($request->payment_method, fn($query, $method) => $query->where('payment_method', $method))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('public.donations.donation-history', compact('donations'));
    }

    public function edit($id)
    {
        $donation = Donation::where('id', $id)
            ->where('session_id', session()->getId())
            ->firstOrFail();

        return view('public.donations.donation-edit', compact('donation'));
    }

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
            'message',
        ]));

        return redirect()->route('donation-history')
            ->with('success', 'Donation updated successfully!');
    }

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
