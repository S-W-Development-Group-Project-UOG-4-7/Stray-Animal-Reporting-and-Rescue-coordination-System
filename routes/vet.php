<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vet\DashboardController;
use App\Http\Controllers\Vet\AppointmentController;
use App\Http\Controllers\Vet\AnimalRecordController;

Route::prefix('vet')->name('vet.')->middleware(['auth', 'role:veterinarian,admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::post('/appointments/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    // Animal Health Records
    Route::get('/animal-records', [AnimalRecordController::class, 'index'])->name('animal-records.index');
    Route::get('/animal-records/create', [AnimalRecordController::class, 'create'])->name('animal-records.create');
    Route::post('/animal-records', [AnimalRecordController::class, 'store'])->name('animal-records.store');
    Route::get('/animal-records/{id}', [AnimalRecordController::class, 'show'])->name('animal-records.show');
});
