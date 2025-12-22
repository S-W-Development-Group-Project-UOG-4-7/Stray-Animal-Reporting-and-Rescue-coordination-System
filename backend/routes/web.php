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


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login



// Show login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login POST
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/rescue/dashboard', function () {
    return view('welcome'); // Replace with your dashboard Blade if different
})->middleware('auth');

use App\Http\Controllers\RescueAssignmentController;

Route::middleware('auth')->group(function() {



Route::put('/rescue/{id}/update-status', [RescueAssignmentController::class, 'updateStatus'])->name('rescue.updateStatus');

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
