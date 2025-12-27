<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RescueController;
use App\Http\Controllers\RescueStatusController;
use App\Http\Controllers\ReportAssignmentController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\DashboardController;
use App\Models\Rescue;

// ------------------------
// Home Page
// ------------------------
Route::get('/', function () {
    return redirect()->route('login');
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

Route::get('/reports/{id}', [ReportAssignmentController::class, 'show'])
    ->name('reports.show');

Route::post('/reports/{id}/accept', [ReportAssignmentController::class, 'accept'])
    ->name('reports.accept');

Route::post('/reports/{id}/update-status', [ReportController::class, 'updateStatus'])
    ->name('reports.updateStatus');

// Route group for Rescue Team (optional)
Route::prefix('rescue')->name('rescue.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    // Animals routes
    Route::get('/animals', [AnimalController::class, 'index'])->name('animals');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/{id}', [AnimalController::class, 'show'])->name('animals.show');
    Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::put('/animals/{id}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{id}', [AnimalController::class, 'destroy'])->name('animals.destroy');

    // Adoptions routes
    Route::get('/adoptions', [AdoptionController::class, 'index'])->name('adoptions');
    Route::get('/adoptions/create', [AdoptionController::class, 'create'])->name('adoptions.create');
    Route::post('/adoptions', [AdoptionController::class, 'store'])->name('adoptions.store');
    Route::get('/adoptions/{id}', [AdoptionController::class, 'show'])->name('adoptions.show');
    Route::post('/adoptions/{id}/approve', [AdoptionController::class, 'approve'])->name('adoptions.approve');
    Route::post('/adoptions/{id}/reject', [AdoptionController::class, 'reject'])->name('adoptions.reject');
    Route::post('/adoptions/batch-approve', [AdoptionController::class, 'batchApprove'])->name('adoptions.batchApprove');
    Route::post('/adoptions/{id}/update-status', [AdoptionController::class, 'updateStatus'])->name('adoptions.updateStatus');

});
