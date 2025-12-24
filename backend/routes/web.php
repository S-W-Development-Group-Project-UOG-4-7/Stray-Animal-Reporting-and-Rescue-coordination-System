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
use App\Http\Controllers\ReportAssignmentController;

Route::get('/reports/{id}', [ReportAssignmentController::class, 'show'])
    ->name('reports.show');

Route::post('/reports/{id}/accept', [ReportAssignmentController::class, 'accept'])
    ->name('reports.accept');
use App\Http\Controllers\AnimalController;

// Route group for Rescue Team (optional)
Route::prefix('rescue')->name('rescue.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    // Animals routes
    Route::get('/animals', [AnimalController::class, 'index'])->name('animals');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');

    Route::get('/adoptions', [AdoptionController::class, 'index'])->name('adoptions');

});
Route::prefix('rescue')->name('rescue.')->group(function () {

    Route::get('/animals', [AnimalController::class, 'index'])->name('animals');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');

});
use App\Http\Controllers\DashboardController;

Route::get('/rescue/dashboard', [DashboardController::class, 'index'])->name('rescue.dashboard');
use App\Http\Controllers\AdoptionController;

Route::get('/rescue/adoptions', [AdoptionController::class, 'index'])->name('rescue.adoptions');
