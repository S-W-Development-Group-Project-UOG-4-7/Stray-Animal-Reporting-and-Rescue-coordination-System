<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VetTreatmentController;
use App\Http\Controllers\MedicalRecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
| These routes are loaded by the RouteServiceProvider within a group 
| which contains the "web" middleware group.
|
*/

// ✅ Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// ✅ Branches CRUD
Route::resource('branches', BranchController::class);

// ✅ Appointments CRUD
Route::resource('appointments', AppointmentController::class);

// ✅ Consultations module
Route::resource('consultations', ConsultationController::class)->only(['index', 'show', 'store']);
Route::post('/consultations/{consultation}/files', [ConsultationController::class, 'uploadFiles'])
    ->name('consultations.files.upload');
Route::post('/consultations/{consultation}/prescriptions', [ConsultationController::class, 'storePrescription'])
    ->name('consultations.prescriptions.store');

// ✅ Vet treatments & Medical Records
Route::prefix('vet')->name('vet.')->group(function () {
    // Vet Treatments
    Route::get('/treatments', [VetTreatmentController::class, 'index'])->name('treatments.index');
    Route::get('/treatments/{treatment}', [VetTreatmentController::class, 'show'])->name('treatments.show');
    Route::post('/treatments/{treatment}/update', [VetTreatmentController::class, 'storeUpdate'])->name('treatments.update');

    // Medical Records
    Route::get('/pets/{pet}/medical/add', [MedicalRecordController::class, 'create'])->name('medical.create');
    Route::post('/pets/{pet}/medical', [MedicalRecordController::class, 'store'])->name('medical.store');
    Route::get('/pets/{pet}/medical/history', [MedicalRecordController::class, 'history'])->name('medical.history');
});
