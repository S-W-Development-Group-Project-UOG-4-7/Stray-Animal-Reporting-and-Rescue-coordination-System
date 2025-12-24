<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function index()
    {
        return view('rescue-adoptions'); // matches your Blade file
    }
}
