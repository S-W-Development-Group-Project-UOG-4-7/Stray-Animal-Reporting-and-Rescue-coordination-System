<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RescueController;
use App\Http\Controllers\RescueStatusController;
use App\Models\Rescue;

// ------------------------
// Home Page
// ------------------------
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ------------------------
// Authentication Routes
// ------------------------
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------------
// Rescue Team Routes
// ------------------------
Route::prefix('rescue')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        $rescues = Rescue::all();
        return view('rescue-team', compact('rescues'));
    })->name('rescue.dashboard');

    // READ – View all rescues via AJAX
    Route::get('/status', [RescueStatusController::class, 'viewStatus'])->name('rescue.status');

    // EDIT – Show edit form for a specific rescue
    Route::get('/{id}/edit', [RescueController::class, 'edit'])->name('rescue.edit');

    // UPDATE – Process the update form submission
    Route::put('/update-status/{id}', [RescueController::class, 'update'])->name('rescue.update');

    // Reports page
    Route::get('/reports', function () {
        return view('rescue-reports');
    })->name('rescue.reports');

    // Assignments page
    Route::get('/assignments', function () {
        return view('rescue-assignments');
    })->name('rescue.assignments');

    // Animals page
    Route::get('/animals', function () {
        return view('rescue-animals');
    })->name('rescue.animals');

    // Adoptions page
    Route::get('/adoptions', function () {
        return view('rescue-adoptions');
    })->name('rescue.adoptions');

});
