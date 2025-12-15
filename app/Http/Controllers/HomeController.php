<?php

namespace App\Http\Controllers;

// Add this import
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Display the adoption page.
     *
     * @return \Illuminate\View\View
     */
    public function adoption()
    {
        // You can fetch pets from database here
        $pets = [
            [
                'name' => 'Max',
                'breed' => 'Golden Retriever',
                'age' => '2 years',
                'gender' => 'Male',
                'image' => 'https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w=1200&auto=format&fit=crop',
                'temperament' => 'Friendly'
            ],
            // Add more pets...
        ];
        
        return view('adoption', compact('pets'));
    }
    
    /**
     * Handle language change.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|string|in:en,es,fr,de,ja,si'
        ]);
        
        session(['locale' => $request->language]);
        
        return response()->json(['success' => true, 'message' => 'Language changed']);
    }
}