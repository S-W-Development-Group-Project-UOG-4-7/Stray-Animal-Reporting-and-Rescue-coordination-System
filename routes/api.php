<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalReportController;
use App\Http\Controllers\DonationController;

/*
|--------------------------------------------------------------------------
| API Routes
| Note: These routes are stateless and typically for AJAX requests
|--------------------------------------------------------------------------
*/

Route::middleware(['api'])->group(function () {
    // API endpoint for submitting animal reports (if you want REST API)
    Route::post('/reportanimal', [AnimalReportController::class, 'store'])
        ->name('api.animal.report.store');
    
    // API endpoint for tracking reports
    Route::get('/reportanimal/track/{reportId}', [AnimalReportController::class, 'track'])
        ->name('api.animal.report.track');
    
    // API endpoint for bank transfers (for AJAX submissions)
    Route::post('/donate/bank', [DonationController::class, 'processBankDonation'])
        ->name('api.donations.bank.store');
    
    // API endpoint for card donations (for AJAX submissions)
    Route::post('/donate/card', [DonationController::class, 'processCardDonation'])
        ->name('api.donations.card.store');
    
    // API endpoint for donation history (JSON response)
    Route::get('/donations/history', [DonationController::class, 'history'])
        ->name('api.donations.history');
});