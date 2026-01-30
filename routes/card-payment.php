<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardPaymentController;

// Card Payment Route - Secure route for processing card donations
Route::post('/donation/card', [CardPaymentController::class, 'store'])->name('donation.card.store');
