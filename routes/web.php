<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleRequestController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', fn () => redirect('/adoptions'))->name('home');

// ==========================================
// 1. PUBLIC ADOPTION LISTINGS
// ==========================================
Route::get('/adoptions', [AdoptionController::class, 'index']);
Route::get('/adoptions/{animal}', [AdoptionController::class, 'show']);
Route::post('/adoptions/{animal}/request', [AdoptionRequestController::class, 'store']);

// ==========================================
// 2. USER DASHBOARD (MY REQUESTS)
// ==========================================
Route::get('/my-requests', [AdoptionRequestController::class, 'index'])
    ->name('requests.index');

Route::get('/adoption-requests/{id}/edit', [AdoptionRequestController::class, 'edit']);
Route::put('/adoption-requests/{id}', [AdoptionRequestController::class, 'update']);
Route::delete('/adoption-requests/{id}', [AdoptionRequestController::class, 'destroy']);

Route::get('/role-requests/{id}/edit', [RoleRequestController::class, 'edit']);
Route::put('/role-requests/{id}', [RoleRequestController::class, 'update']);
Route::delete('/role-requests/{id}', [RoleRequestController::class, 'destroy']);

// ==========================================
// 3. JOIN US (ROLES)
// ==========================================
Route::get('/join-us', [RoleRequestController::class, 'create'])
    ->name('roles.create');
Route::post('/join-us', [RoleRequestController::class, 'store'])
    ->name('roles.store');

// ==========================================
// 4. REVIEWS
// ==========================================
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/write/{requestId}', [ReviewController::class, 'create']);
Route::post('/reviews/write/{requestId}', [ReviewController::class, 'store']);

// ==========================================
// 5. ADMIN ACTIONS
// ==========================================
Route::post('/admin/approve/{id}', [AdminController::class, 'approveRequest']);

// ==========================================
// REPORTS
// ==========================================
Route::get('/reports', fn () => view('reports'));
Route::get('/reports/create', fn () => 'Create Report Coming Soon');
Route::get('/reports/{id}', fn ($id) => "View Report: {$id}");

// ==========================================
// RESCUES
// ==========================================
Route::get('/rescues', fn () => view('rescues'));
Route::get('/rescues/create', fn () => 'Create Rescue Coming Soon');
Route::get('/rescues/{id}', fn ($id) => "View Rescue: {$id}");

// ==========================================
// USERS
// ==========================================
Route::get('/users', fn () => view('users'));
Route::get('/users/create', fn () => 'Create User Coming Soon');
Route::get('/users/{id}', fn ($id) => "View User: {$id}");
Route::get('/users/{id}/edit', fn ($id) => "Edit User: {$id}");

// ==========================================
// VETERINARIANS
// ==========================================
Route::get('/veterinarians', fn () => view('veterinarians'));
Route::get('/veterinarians/create', fn () => 'Create Veterinarian Coming Soon');
Route::get('/veterinarians/collaboration', fn () => 'Vet Collaboration Coming Soon');

// ==========================================
// OTHER PAGES
// ==========================================
Route::get('/donations', fn () => view('donations'));
Route::get('/ecommerce', fn () => view('ecommerce'));
Route::get('/analytics', fn () => view('analytics'));
Route::get('/settings', fn () => view('settings'));
Route::get('/profile', fn () => 'Profile Coming Soon');
Route::get('/activity', fn () => 'Activity Log Coming Soon');
Route::get('/notifications', fn () => 'Notifications Coming Soon');
Route::get('/logout', fn () => 'Logout Coming Soon');

// ==========================================
// STATIC PAGES
// ==========================================
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/faq', fn () => 'FAQ Coming Soon');
Route::get('/help', fn () => 'Help Coming Soon');
Route::get('/privacy', fn () => 'Privacy Coming Soon');
?>
