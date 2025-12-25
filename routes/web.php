<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Branches CRUD
Route::resource('branches', BranchController::class);

// Appointments CRUD
Route::resource('appointments', AppointmentController::class);

// Consultations module
Route::resource('consultations', ConsultationController::class)->only(['index', 'show', 'store']);
Route::post('/consultations/{consultation}/files', [ConsultationController::class, 'uploadFiles'])
    ->name('consultations.files.upload');
Route::post('/consultations/{consultation}/prescriptions', [ConsultationController::class, 'storePrescription'])
    ->name('consultations.prescriptions.store');
