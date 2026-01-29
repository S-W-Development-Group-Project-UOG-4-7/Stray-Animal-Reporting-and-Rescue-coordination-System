<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the available animals.
     */
    public function index(Request $request)
    {
        // 1. Base Query: Only show animals that are 'Adoptable'
        // This hides animals that have been marked as 'Adopted'
        $q = Animal::where('status', 'Adoptable');

        // 2. Search Filter (Name or Breed)
        if ($request->filled('search')) {
            $s = $request->string('search');
            $q->where(function($qq) use ($s) {
                $qq->where('name', 'like', "%$s%")
                   ->orWhere('breed', 'like', "%$s%");
            });
        }

        // 3. Type Filter (Dog vs Cat)
        if ($request->filled('type')) {
            $q->where('type', $request->string('type'));
        }

        // 4. Gender Filter (Male vs Female)
        if ($request->filled('gender')) {
            $q->where('gender', $request->string('gender'));
        }

        // 5. Sorting
        $sort = $request->string('sort', 'new');
        if ($sort === 'age_asc') {
            $q->orderBy('age', 'asc');
        } elseif ($sort === 'age_desc') {
            $q->orderBy('age', 'desc');
        } else {
            $q->latest();
        }

        // 6. Get Results
        $animals = $q->paginate(9)->withQueryString();

        return view('adoptions.index', compact('animals'));
    }

    /**
     * Display the specific pet details.
     */
    public function show(Animal $animal)
    {
        return view('adoptions.show', compact('animal'));
    }
}