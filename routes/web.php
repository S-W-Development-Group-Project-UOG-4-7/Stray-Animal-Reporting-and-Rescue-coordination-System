<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DonationController;



/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Donation Routes (No Login Required)
|--------------------------------------------------------------------------
*/

// Show donation page (GET)
Route::get('/donate', [DonationController::class, 'index'])->name('donation');

// Submit donation (POST)
Route::post('/donate', [DonationController::class, 'storeBank'])->name('donation.store');

// Donation history
Route::get('/donation/history', [DonationController::class, 'history'])
    ->name('donation-history');
// Edit donation
Route::get('/donation/{id}/edit', [DonationController::class, 'edit'])->name('donation-edit');

// Update donation
Route::put('/donation/{id}', [DonationController::class, 'update'])->name('donation.update');

// Delete donation
Route::delete('/donation/{id}', [DonationController::class, 'destroy'])->name('donation.delete');
/*
|--------------------------------------------------------------------------
| Report Animal
|--------------------------------------------------------------------------
*/
Route::get('/report-animal', function () {
    return view('reportanimal');
})->name('animal.report.form');

Route::post('/report-animal', [ReportController::class, 'store'])
    ->name('animal.report.store');

/*
|--------------------------------------------------------------------------
| Report Success Page
|--------------------------------------------------------------------------
*/
Route::get('/report-success/{reportId}', [ReportController::class, 'success'])
    ->name('report.success');

/*
|--------------------------------------------------------------------------
| Track Report
|--------------------------------------------------------------------------
*/
Route::get('/track-report/{reportId?}', [ReportController::class, 'trackReport'])
    ->name('track.report');

/*
|--------------------------------------------------------------------------
| Track Status (NEW - with visual timeline)
|--------------------------------------------------------------------------
*/
Route::get('/track-status', [ReportController::class, 'trackStatus'])
    ->name('track.status');

/*
|--------------------------------------------------------------------------
| My Reports (Search by Email)
|--------------------------------------------------------------------------
*/
Route::get('/my-reports', [ReportController::class, 'myReports'])
    ->name('my-reports');  // Fixed route name
/*
|--------------------------------------------------------------------------
| Edit Report
|--------------------------------------------------------------------------
*/
Route::get('/edit-report/{reportId}', [ReportController::class, 'edit'])
    ->name('report.edit');

/*
|--------------------------------------------------------------------------
| Verify Email Before Edit (AJAX)
|--------------------------------------------------------------------------
*/
Route::post('/verify-edit-email', [ReportController::class, 'verifyEditEmail'])
    ->name('report.verify.edit.email');

/*
|--------------------------------------------------------------------------
| Update Report (PUT via fetch + method override)
|--------------------------------------------------------------------------
*/
Route::put('/report/{reportId}', [ReportController::class, 'update'])
    ->name('report.update');

/*
|--------------------------------------------------------------------------
| Delete Report
|--------------------------------------------------------------------------
*/
Route::get('/delete-report/{reportId?}', [ReportController::class, 'showDeleteForm'])
    ->name('report.delete');

Route::delete('/report/{reportId}', [ReportController::class, 'destroy'])
    ->name('report.destroy');