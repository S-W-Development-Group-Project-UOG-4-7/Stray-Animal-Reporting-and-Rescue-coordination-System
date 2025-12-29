<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalReportController;

Route::post('/reportanimal', [AnimalReportController::class, 'store']);
Route::get('/reportanimal/track/{reportId}', [AnimalReportController::class, 'track']);