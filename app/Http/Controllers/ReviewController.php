<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Public page showing all reviews
    public function index()
    {
        $reviews = Review::with('animal')->latest()->paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    // Show the "Write a Review" form for a specific approved request
    public function create($requestId)
    {
        // Security: Check if user "owns" this request via session
        $myIds = session()->get('my_request_ids', []);
        if (!in_array($requestId, $myIds)) {
            abort(403, 'Unauthorized');
        }

        $adoptionRequest = AdoptionRequest::with('animal')->findOrFail($requestId);

        // Check if already reviewed
        if ($adoptionRequest->review) {
            return redirect('/reviews')->with('error', 'You have already reviewed this adoption!');
        }

        return view('reviews.create', compact('adoptionRequest'));
    }

    // Save the review
    public function store(Request $request, $requestId)
    {
        $adoptionRequest = AdoptionRequest::findOrFail($requestId);

        $data = $request->validate([
            'rating'  => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'min:5', 'max:500'],
        ]);

        Review::create([
            'adoption_request_id' => $adoptionRequest->id,
            'animal_id'           => $adoptionRequest->animal_id,
            'reviewer_name'       => $adoptionRequest->full_name, // Auto-fill name
            'rating'              => $data['rating'],
            'comment'             => $data['comment'],
        ]);

        return redirect('/reviews')->with('success', 'Thank you! Your review has been published.');
    }
}