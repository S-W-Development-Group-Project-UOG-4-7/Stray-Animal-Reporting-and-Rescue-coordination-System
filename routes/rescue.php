<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rescue\DashboardController;
use App\Http\Controllers\Rescue\RescueController;
use App\Http\Controllers\Rescue\RescueStatusController;
use App\Http\Controllers\Rescue\ReportController;
use App\Http\Controllers\Rescue\ReportAssignmentController;
use App\Http\Controllers\Rescue\AnimalController;
use App\Http\Controllers\Rescue\AdoptionController;
use App\Http\Controllers\Rescue\VetAppointmentController;

Route::prefix('rescue')->name('rescue.')->middleware(['auth', 'role:rescue_team,admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rescue operations
    Route::get('/status', [RescueStatusController::class, 'viewStatus'])->name('status');
    Route::get('/{id}/edit', [RescueController::class, 'edit'])->name('edit');
    Route::put('/update-status/{id}', [RescueController::class, 'update'])->name('update');

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    // Animals
    Route::get('/animals', [AnimalController::class, 'index'])->name('animals');
    Route::get('/animals/create/{report}', [AnimalController::class, 'createFromReport'])->name('animals.createFromReport');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/{id}', [AnimalController::class, 'show'])->name('animals.show');
    Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::put('/animals/{id}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{id}', [AnimalController::class, 'destroy'])->name('animals.destroy');

    // Vet Appointments
    Route::get('/vet/create/{animal}', [VetAppointmentController::class, 'create'])->name('vet.create');
    Route::post('/vet/store', [VetAppointmentController::class, 'store'])->name('vet.store');

    // Adoptions
    Route::get('/adoptions', [AdoptionController::class, 'index'])->name('adoptions');
    Route::get('/adoptions/create', [AdoptionController::class, 'create'])->name('adoptions.create');
    Route::post('/adoptions', [AdoptionController::class, 'store'])->name('adoptions.store');
    Route::get('/adoptions/{id}', [AdoptionController::class, 'show'])->name('adoptions.show');
    Route::post('/adoptions/{id}/approve', [AdoptionController::class, 'approve'])->name('adoptions.approve');
    Route::post('/adoptions/{id}/reject', [AdoptionController::class, 'reject'])->name('adoptions.reject');
    Route::post('/adoptions/batch-approve', [AdoptionController::class, 'batchApprove'])->name('adoptions.batchApprove');
    Route::post('/adoptions/{id}/update-status', [AdoptionController::class, 'updateStatus'])->name('adoptions.updateStatus');
});

// Report assignment routes (under auth)
Route::prefix('rescue')->name('rescue.')->middleware(['auth', 'role:rescue_team,admin'])->group(function () {
    Route::get('/reports/{id}', [ReportAssignmentController::class, 'show'])->name('reports.show');
    Route::post('/reports/{id}/accept', [ReportAssignmentController::class, 'accept'])->name('reports.accept');
    Route::post('/reports/{id}/update-status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');
});
