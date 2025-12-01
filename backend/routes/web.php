<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Add this route
Route::get('/rescue-team', function () {
    return view('rescue-team');
})->name('rescue-team.dashboard');
