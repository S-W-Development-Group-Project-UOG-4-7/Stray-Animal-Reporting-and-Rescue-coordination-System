<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleRequestController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
<<<<<<< Updated upstream
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage Redirect
Route::get('/', fn() => redirect('/adoptions'));

// ==========================================
// 1. PUBLIC ADOPTION LISTINGS
// ==========================================
Route::get('/adoptions', [AdoptionController::class, 'index']);
Route::get('/adoptions/{animal}', [AdoptionController::class, 'show']);
// Submit a new adoption request
Route::post('/adoptions/{animal}/request', [AdoptionRequestController::class, 'store']);


// ==========================================
// 2. USER DASHBOARD (MY REQUESTS)
// ==========================================
// View Dashboard
Route::get('/my-requests', [AdoptionRequestController::class, 'index'])->name('requests.index');

// Edit & Delete Adoption Requests
Route::get('/adoption-requests/{id}/edit', [AdoptionRequestController::class, 'edit']);
Route::put('/adoption-requests/{id}', [AdoptionRequestController::class, 'update']);
Route::delete('/adoption-requests/{id}', [AdoptionRequestController::class, 'destroy']);

// Edit & Delete Role Requests
Route::get('/role-requests/{id}/edit', [RoleRequestController::class, 'edit']);
Route::put('/role-requests/{id}', [RoleRequestController::class, 'update']);
Route::delete('/role-requests/{id}', [RoleRequestController::class, 'destroy']);


// ==========================================
// 3. JOIN US (ROLES)
// ==========================================
Route::get('/join-us', [RoleRequestController::class, 'create'])->name('roles.create');
Route::post('/join-us', [RoleRequestController::class, 'store'])->name('roles.store');


// ==========================================
// 4. REVIEWS
// ==========================================
// Public List of Reviews
Route::get('/reviews', [ReviewController::class, 'index']);

// Write a Review (Linked to specific request ID)
Route::get('/reviews/write/{requestId}', [ReviewController::class, 'create']);
Route::post('/reviews/write/{requestId}', [ReviewController::class, 'store']);


// ==========================================
// 5. ADMIN ACTIONS
// ==========================================
// Logic to Approve Request & Remove Animal from List
Route::post('/admin/approve/{id}', [AdminController::class, 'approveRequest']);
=======
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Adoption Pages
|--------------------------------------------------------------------------
*/
Route::get('/adoption', function () {
    return view('adoption.list');
})->name('adoption.list');

Route::post('/adoption/submit', [AdoptionController::class, 'store'])
    ->name('adoption.submit');

/*
|--------------------------------------------------------------------------
| Reports
|--------------------------------------------------------------------------
*/
Route::get('/reports', fn() => view('reports'));
Route::get('/reports/create', fn() => 'Create Report Coming Soon');
Route::get('/reports/{id}', fn($id) => "View Report: {$id}");

/*
|--------------------------------------------------------------------------
| Rescue Operations
|--------------------------------------------------------------------------
*/
Route::get('/rescues', fn() => view('rescues'));
Route::get('/rescues/create', fn() => 'Create Rescue Coming Soon');
Route::get('/rescues/{id}', fn($id) => "View Rescue: {$id}");

/*
|--------------------------------------------------------------------------
| Adoptions (Admin side)
|--------------------------------------------------------------------------
*/
Route::get('/adoptions', fn() => view('adoptions'));
Route::get('/adoptions/{id}', fn($id) => "View Adoption: {$id}");

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
Route::get('/users', fn() => view('users'));
Route::get('/users/create', fn() => 'Create User Coming Soon');
Route::get('/users/{id}', fn($id) => "View User: {$id}");
Route::get('/users/{id}/edit', fn($id) => "Edit User: {$id}");

/*
|--------------------------------------------------------------------------
| Veterinarians
|--------------------------------------------------------------------------
*/
Route::get('/veterinarians', fn() => view('veterinarians'));
Route::get('/veterinarians/create', fn() => 'Create Veterinarian Coming Soon');
Route::get('/veterinarians/collaboration', fn() => 'Vet Collaboration Coming Soon');

/*
|--------------------------------------------------------------------------
| Other Pages
|--------------------------------------------------------------------------
*/
Route::get('/donations', fn() => view('donations'));
Route::get('/ecommerce', fn() => view('ecommerce'));
Route::get('/analytics', fn() => view('analytics'));
Route::get('/settings', fn() => view('settings'));
Route::get('/profile', fn() => 'Profile Coming Soon');
Route::get('/activity', fn() => 'Activity Log Coming Soon');
Route::get('/notifications', fn() => 'Notifications Coming Soon');
Route::get('/logout', fn() => 'Logout Coming Soon');

/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/faq', fn() => 'FAQ Coming Soon');
Route::get('/help', fn() => 'Help Coming Soon');
Route::get('/privacy', fn() => 'Privacy Coming Soon');
>>>>>>> Stashed changes
