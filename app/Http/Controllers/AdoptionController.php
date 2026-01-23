<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\Animal;
=======
>>>>>>> Stashed changes
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
<<<<<<< Updated upstream
    /**
     * Display a listing of the available animals.
     */
    public function index(Request $request)
    {
        // ---------------------------------------------------------
        // 1. THE LOGIC TO HIDE ADOPTED PETS IS HERE
        // ---------------------------------------------------------
        // We start the query by asking ONLY for 'Adoptable' pets.
        // If the AdminController changes a pet to 'Adopted', 
        // this line AUTOMATICALLY excludes it from the list.
        $q = Animal::where('status', 'Adoptable');

        // ---------------------------------------------------------
        // 2. APPLY SEARCH FILTERS
        // ---------------------------------------------------------
        
        // Filter by Name or Breed
        if ($request->filled('search')) {
            $s = $request->string('search');
            $q->where(function($qq) use ($s) {
                $qq->where('name', 'like', "%$s%")
                   ->orWhere('breed', 'like', "%$s%");
            });
        }

        // Filter by Type (Cat vs Dog)
        if ($request->filled('type')) {
            $q->where('type', $request->string('type'));
        }

        // Filter by Gender (Male vs Female)
        if ($request->filled('gender')) {
            $q->where('gender', $request->string('gender'));
        }

        // ---------------------------------------------------------
        // 3. APPLY SORTING
        // ---------------------------------------------------------
        $sort = $request->string('sort', 'new');
        
        if ($sort === 'age_asc') {
            $q->orderBy('age', 'asc'); // Youngest first
        } elseif ($sort === 'age_desc') {
            $q->orderBy('age', 'desc'); // Oldest first
        } else {
            $q->latest(); // Default: Newest added first
        }

        // ---------------------------------------------------------
        // 4. FETCH DATA
        // ---------------------------------------------------------
        $animals = $q->paginate(9)->withQueryString();

        return view('adoptions.index', compact('animals'));
    }

    /**
     * Display the specific pet details.
     */
    public function show(Animal $animal)
    {
        // Optional: Block access if the pet is already adopted
        // (Uncomment this if you want to show a 404 error for adopted pets)
        /*
        if ($animal->status !== 'Adoptable') {
            abort(404); 
        }
        */

        return view('adoptions.show', compact('animal'));
    }
}
=======
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'housing_type' => 'required',
            'animal_id' => 'required',
            'previous_pet' => 'required',
            'adoption_reason' => 'required',
            'home_environment' => 'required',
            'terms' => 'required'
        ]);

        Adoption::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'housing_type' => $request->housing_type,
            'animal_id' => $request->animal_id,
            'previous_pet' => $request->previous_pet,
            'current_pets' => $request->current_pets,
            'adoption_reason' => $request->adoption_reason,
            'home_environment' => $request->home_environment,
            'vet_info' => $request->vet_info,
            'terms' => $request->terms ? 1 : 0,
            'newsletter' => $request->newsletter ? 1 : 0,
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
>>>>>>> Stashed changes
