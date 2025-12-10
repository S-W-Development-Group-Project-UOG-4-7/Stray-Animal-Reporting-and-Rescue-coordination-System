<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoptionController;

Route::get('/', function () {
    return view('welcome');
});



// Adoption Module Routes
Route::get('/adoptions', [AdoptionController::class, 'index'])->name('adoption.index');
Route::get('/adoptions/create', [AdoptionController::class, 'create'])->name('adoption.create');
Route::post('/adoptions', [AdoptionController::class, 'store'])->name('adoption.store');
Route::get('/adoptions/{id}', [AdoptionController::class, 'show'])->name('adoption.show');
