<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/home', function () {
    return view('home');
})->name('home');

// Report animal form page
Route::get('/', [ReportController::class, 'create'])->name('animal.report.form');

// Form submission - Store report
Route::post('/animal-report/store', [ReportController::class, 'store'])->name('animal.report.store');

// Reports history page
Route::get('/reports/history', [ReportController::class, 'history'])->name('reports.history');

// Tracking status page for individual report
Route::get('/track/{id}', [ReportController::class, 'track'])->name('track.report');

// Update report status (admin only)
Route::patch('/report/{id}/status', [ReportController::class, 'updateStatus'])->name('report.update.status');