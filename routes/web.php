<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdoptionController;

Route::get('/', function () {
    return view('dashboard');
});

// Reports
Route::get('/reports', fn() => view('reports'));
Route::get('/reports/create', fn() => 'Create Report Coming Soon');
Route::get('/reports/{id}', fn($id) => "View Report: {$id}");

// Rescue Operations
Route::get('/rescues', fn() => view('rescues'));
Route::get('/rescues/create', fn() => 'Create Rescue Coming Soon');
Route::get('/rescues/{id}', fn($id) => "View Rescue: {$id}");

// Adoptions
Route::get('/adoptions', fn() => view('adoptions'));
Route::get('/adoptions/create', fn() => 'Create Adoption Coming Soon');
Route::get('/adoptions/{id}', fn($id) => "View Adoption: {$id}");

// Users
Route::get('/users', fn() => view('users'));
Route::get('/users/create', fn() => 'Create User Coming Soon');
Route::get('/users/{id}', fn($id) => "View User: {$id}");
Route::get('/users/{id}/edit', fn($id) => "Edit User: {$id}");

// Veterinarians
Route::get('/veterinarians', fn() => view('veterinarians'));
Route::get('/veterinarians/create', fn() => 'Create Veterinarian Coming Soon');
Route::get('/veterinarians/collaboration', fn() => 'Vet Collaboration Coming Soon');

// Donations
Route::get('/donations', fn() => view('donations'));

// E-commerce
Route::get('/ecommerce', fn() => view('ecommerce'));

// Analytics
Route::get('/analytics', fn() => view('analytics'));

// Settings
Route::get('/settings', fn() => view('settings'));

// Other system pages
Route::get('/contact', fn() => 'Contact Coming Soon');
Route::get('/faq', fn() => 'FAQ Coming Soon');
Route::get('/help', fn() => 'Help Coming Soon');
Route::get('/privacy', fn() => 'Privacy Coming Soon');
Route::get('/activity', fn() => 'Activity Log Coming Soon');
Route::get('/notifications', fn() => 'Notifications Coming Soon');
Route::get('/logout', fn() => 'Logout Coming Soon');
Route::get('/profile', fn() => 'Profile Coming Soon');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/adoption', function () {
    return view('adoption.list');
})->name('adoption.list');

// Additional routes for other pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

