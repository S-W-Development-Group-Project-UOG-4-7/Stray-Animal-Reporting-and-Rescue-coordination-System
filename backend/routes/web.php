<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Simple rescue routes with names (no auth for testing)
Route::prefix('rescue')->name('rescue.')->group(function () {
    Route::get('/dashboard', function () {
        return view('rescue-team');
    })->name('dashboard');
    
    Route::get('/reports', function () {
        return view('rescue-reports');
    })->name('reports');
    
    Route::get('/assignments', function () {
        return view('rescue-assignments');
    })->name('assignments');
    
    Route::get('/animals', function () {
        return view('rescue-animals');
    })->name('animals');
    
    Route::get('/adoptions', function () {
        return view('rescue-adoptions');
    })->name('adoptions');
});