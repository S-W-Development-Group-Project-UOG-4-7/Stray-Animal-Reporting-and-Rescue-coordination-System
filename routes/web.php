<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

// Homepage - Shows the main website
Route::get('/', function () {
    return view('home'); // This should be your home page view
})->name('home');

// Report animal form page
Route::get('/report-animal', function () {
    return view('reportanimal'); // This is your report form page
})->name('animal.report.form');

// Store report data (form submission)
Route::post('/report-animal', [ReportController::class, 'store'])
    ->name('animal.report.store');

// Success page after submission
Route::get('/report-success/{reportId}', [ReportController::class, 'success'])
    ->name('report.success');

// Track report page
Route::get('/track-report/{reportId?}', [ReportController::class, 'trackReport'])
    ->name('track.report');

// Delete report page
Route::get('/delete-report/{reportId?}', [ReportController::class, 'showDeleteForm'])
    ->name('report.delete');

// Delete report action
Route::delete('/report/{reportId}', [ReportController::class, 'destroy'])
    ->name('report.destroy');