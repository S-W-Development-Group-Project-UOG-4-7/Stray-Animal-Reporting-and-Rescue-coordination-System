<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleRequestController;

Route::get('/', fn() => redirect('/adoptions'));

// 1. Public Listings
Route::get('/adoptions', [AdoptionController::class, 'index']);
Route::get('/adoptions/{animal}', [AdoptionController::class, 'show']);

// 2. Adoption Requests
Route::post('/adoptions/{animal}/request', [AdoptionRequestController::class, 'store']);
Route::get('/my-requests', [AdoptionRequestController::class, 'index'])->name('requests.index');

// New: Edit & Delete Adoption Requests
Route::get('/adoption-requests/{id}/edit', [AdoptionRequestController::class, 'edit']);
Route::put('/adoption-requests/{id}', [AdoptionRequestController::class, 'update']);
Route::delete('/adoption-requests/{id}', [AdoptionRequestController::class, 'destroy']);

// 3. Role Requests
Route::get('/join-us', [RoleRequestController::class, 'create'])->name('roles.create');
Route::post('/join-us', [RoleRequestController::class, 'store'])->name('roles.store');

// New: Edit & Delete Role Requests
Route::get('/role-requests/{id}/edit', [RoleRequestController::class, 'edit']);
Route::put('/role-requests/{id}', [RoleRequestController::class, 'update']);
Route::delete('/role-requests/{id}', [RoleRequestController::class, 'destroy']);

// 4. Reviews
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']);