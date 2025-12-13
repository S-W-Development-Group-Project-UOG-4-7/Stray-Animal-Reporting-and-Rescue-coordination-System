<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');


// ==========================
// Authentication Routes
// ==========================

// Registration
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show'); // Show form
Route::post('/register', [AuthController::class, 'register'])->name('register.post');    // Submit form

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');          // Show form
Route::post('/login', [AuthController::class, 'login'])->name('login.post');             // Submit form

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\AssignmentController;

Route::middleware('auth')->group(function() {
    // Show form to accept a new assignment
    Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');

    // Handle form submission
    Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');

    // Optional: List all assignments
    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');


Route::middleware('auth')->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{id}/accept', [ReportController::class, 'accept'])->name('reports.accept');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
});

});


// ==========================
// Rescue Team Routes
// Prefix: /rescue
// ==========================
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
