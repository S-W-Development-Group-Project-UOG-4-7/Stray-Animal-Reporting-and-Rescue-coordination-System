<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('animal')->latest()->paginate(10);
        return view('public.reviews.index', compact('reviews'));
    }

    public function create($requestId)
    {
        $myIds = session()->get('my_request_ids', []);
        if (!in_array($requestId, $myIds)) {
            abort(403, 'Unauthorized');
        }

        $adoptionRequest = AdoptionRequest::with('animal')->findOrFail($requestId);

        if ($adoptionRequest->review) {
            return redirect('/reviews')->with('error', 'You have already reviewed this adoption!');
        }

        return view('public.reviews.create', compact('adoptionRequest'));
    }

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
            'reviewer_name'       => $adoptionRequest->full_name,
            'rating'              => $data['rating'],
            'comment'             => $data['comment'],
        ]);

        return redirect('/reviews')->with('success', 'Thank you! Your review has been published.');
    }
}
