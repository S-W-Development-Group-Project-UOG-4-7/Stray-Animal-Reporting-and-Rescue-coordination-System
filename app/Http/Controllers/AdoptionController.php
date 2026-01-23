<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
  public function index(Request $request)
  {
    $q = Animal::query()->where('status', 'Adoptable');

    if ($request->filled('search')) {
      $s = $request->string('search');
      $q->where(function($qq) use ($s) {
        $qq->where('name', 'like', "%$s%")
           ->orWhere('breed', 'like', "%$s%")
           ->orWhere('condition', 'like', "%$s%");
      });
    }

    if ($request->filled('breed')) {
      $q->where('breed', $request->string('breed'));
    }

    $sort = $request->string('sort', 'new');
    if ($sort === 'age_asc') $q->orderBy('age', 'asc');
    else if ($sort === 'age_desc') $q->orderBy('age', 'desc');
    else $q->latest();

    $animals = $q->paginate(9)->withQueryString();

    $breeds = Animal::whereNotNull('breed')->distinct()->orderBy('breed')->pluck('breed');

    return view('adoptions.index', compact('animals','breeds'));
  }

  public function show(Animal $animal)
  {
    return view('adoptions.show', compact('animal'));
  }
}

