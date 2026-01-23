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