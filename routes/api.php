<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rescue\RescueController;

Route::get('/rescues', [RescueController::class, 'dashboard']);
Route::post('/rescues', [RescueController::class, 'store']);
Route::put('/rescues/{id}', [RescueController::class, 'update']);
