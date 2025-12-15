<?php

use Illuminate\Support\Facades\Route;

// Route for home page
Route::get('/', function () {
    // Returns the Blade view located at resources/views/home.blade.php
    return view('home');
});

// Route with parameter
Route::get('/user/{name}', function ($name) {
    // Pass data to the Blade view
    return view('user', ['name' => ucfirst($name)]);
})->where('name', '[A-Za-z]+'); // Validation: only letters allowed

// Named route example
Route::get('/about', function () {
    return view('about');
})->name('about.page');
