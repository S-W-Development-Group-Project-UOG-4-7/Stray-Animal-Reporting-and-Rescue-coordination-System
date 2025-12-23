<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RescueController;


Route::get('/rescues', [RescueController::class, 'index']);
Route::post('/rescues', [RescueController::class, 'store']);
Route::put('/rescues/{id}', [RescueController::class, 'update']);
Route::delete('/rescues/{id}', [RescueController::class, 'destroy']);
