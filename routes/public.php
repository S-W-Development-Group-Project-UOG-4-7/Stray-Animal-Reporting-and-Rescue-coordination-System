<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicSite\HomeController;
use App\Http\Controllers\PublicSite\AnimalReportController;
use App\Http\Controllers\PublicSite\DonationController;
use App\Http\Controllers\PublicSite\AdoptionBrowseController;
use App\Http\Controllers\PublicSite\AdoptionRequestController;
use App\Http\Controllers\PublicSite\ReviewController;
use App\Http\Controllers\PublicSite\RoleRequestController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// ─── Adoption Browsing (Sandalee) ────────────────────────────────────
Route::get('/adoption', [AdoptionBrowseController::class, 'index'])->name('adoption.index');
Route::get('/adoption/{animal}', [AdoptionBrowseController::class, 'show'])->name('adoption.show');

// ─── Adoption Requests (Sandalee) ────────────────────────────────────
Route::get('/my-requests', [AdoptionRequestController::class, 'index'])->name('my-requests');
Route::post('/adoption/{animal}/apply', [AdoptionRequestController::class, 'store'])->name('adoption.apply');
Route::get('/adoption-request/{id}/edit', [AdoptionRequestController::class, 'edit'])->name('adoption-request.edit');
Route::put('/adoption-request/{id}', [AdoptionRequestController::class, 'update'])->name('adoption-request.update');
Route::delete('/adoption-request/{id}', [AdoptionRequestController::class, 'destroy'])->name('adoption-request.destroy');

// ─── Reviews (Sandalee) ─────────────────────────────────────────────
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{requestId}/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/{requestId}', [ReviewController::class, 'store'])->name('reviews.store');

// ─── Role Requests (Sandalee) ───────────────────────────────────────
Route::get('/role-request/create', [RoleRequestController::class, 'create'])->name('role-request.create');
Route::post('/role-request', [RoleRequestController::class, 'store'])->name('role-request.store');
Route::get('/role-request/{id}/edit', [RoleRequestController::class, 'edit'])->name('role-request.edit');
Route::put('/role-request/{id}', [RoleRequestController::class, 'update'])->name('role-request.update');
Route::delete('/role-request/{id}', [RoleRequestController::class, 'destroy'])->name('role-request.destroy');

// ─── Animal Reporting (Senaya) ──────────────────────────────────────
Route::get('/report-animal', function () {
    return view('public.reports.reportanimal');
})->name('animal.report.form');
Route::post('/report-animal', [AnimalReportController::class, 'store'])->name('animal.report.store');
Route::get('/report-success/{reportId}', [AnimalReportController::class, 'success'])->name('report.success');
Route::get('/track-report/{reportId?}', [AnimalReportController::class, 'trackReport'])->name('track.report');
Route::get('/track-status', [AnimalReportController::class, 'trackStatus'])->name('track.status');
Route::get('/my-reports', [AnimalReportController::class, 'myReports'])->name('my-reports');
Route::get('/edit-report/{reportId}', [AnimalReportController::class, 'edit'])->name('report.edit');
Route::post('/verify-edit-email', [AnimalReportController::class, 'verifyEditEmail'])->name('report.verify.edit.email');
Route::put('/report/{reportId}', [AnimalReportController::class, 'update'])->name('report.update');
Route::get('/delete-report/{reportId?}', [AnimalReportController::class, 'showDeleteForm'])->name('report.delete');
Route::delete('/report/{reportId}', [AnimalReportController::class, 'destroy'])->name('report.destroy');

// ─── Donations (Senaya) ─────────────────────────────────────────────
Route::get('/donate', [DonationController::class, 'index'])->name('donation');
Route::post('/donate', [DonationController::class, 'storeBank'])->name('donation.store');
Route::get('/donation/history', [DonationController::class, 'history'])->name('donation-history');
Route::get('/donation/{id}/edit', [DonationController::class, 'edit'])->name('donation-edit');
Route::put('/donation/{id}', [DonationController::class, 'update'])->name('donation.update');
Route::delete('/donation/{id}', [DonationController::class, 'destroy'])->name('donation.delete');

// ─── Awareness Corner (Senaya) ─────────────────────────────────────
Route::get('/awareness', function () {
    return view('public.awareness');
})->name('awareness');
