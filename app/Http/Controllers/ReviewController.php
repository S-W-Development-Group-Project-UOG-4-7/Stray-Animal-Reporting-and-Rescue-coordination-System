<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  public function index()
  {
    $reviews = Review::latest()->paginate(10);
    return view('reviews.index', compact('reviews'));
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'full_name' => ['required','string','max:120'],
      'rating' => ['required','integer','min:1','max:5'],
      'comment' => ['nullable','string','max:1000'],
    ]);

    Review::create($data);

    return back()->with('success', 'Thanks! Your review was submitted.');
  }
}
