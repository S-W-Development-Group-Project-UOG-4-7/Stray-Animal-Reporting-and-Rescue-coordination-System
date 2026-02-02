<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AdoptionBrowseController extends Controller
{
    public function index(Request $request)
    {
        $q = Animal::where('status', 'Available');

        if ($request->filled('search')) {
            $s = $request->string('search');
            $q->where(function($qq) use ($s) {
                $qq->where('name', 'like', "%$s%")
                   ->orWhere('breed', 'like', "%$s%");
            });
        }

        if ($request->filled('type')) {
            $q->where('type', $request->string('type'));
        }

        if ($request->filled('gender')) {
            $q->where('gender', $request->string('gender'));
        }

        $sort = $request->string('sort', 'new');
        if ($sort === 'age_asc') {
            $q->orderBy('age', 'asc');
        } elseif ($sort === 'age_desc') {
            $q->orderBy('age', 'desc');
        } else {
            $q->latest();
        }

        $animals = $q->paginate(9)->withQueryString();

        return view('public.adoptions.index', compact('animals'));
    }

    public function show(Animal $animal)
    {
        return view('public.adoptions.show', compact('animal'));
    }
}
