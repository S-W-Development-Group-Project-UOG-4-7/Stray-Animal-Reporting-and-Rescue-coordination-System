<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

// ✅ Landing page
Route::view('/', 'welcome')->name('home');

// ✅ Vet portal group (prefix + name)
Route::prefix('vet')->name('vet.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('branches', BranchController::class);
    Route::resource('appointments', AppointmentController::class);

    Route::get('/treatments', [TreatmentController::class, 'index'])->name('treatments.index');
    Route::post('/treatments/{treatment}/status', [TreatmentController::class, 'updateStatus'])->name('treatments.updateStatus');

    Route::get('/pets/{pet}/history', [MedicalRecordController::class, 'history'])->name('medical.history');
    Route::get('/medical-records/create/{pet}', [MedicalRecordController::class, 'create'])->name('medical.create');
    Route::post('/medical-records/store', [MedicalRecordController::class, 'store'])->name('medical.store');

});

// ✅ Alias route: /dashboard redirects to vet dashboard
Route::get('/dashboard', fn () => redirect()->route('vet.dashboard'))->name('dashboard');

// ✅ Shop routes
Route::get('/shop', [EcommerceController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [EcommerceController::class, 'show'])->name('shop.show');

// ✅ Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// ✅ Checkout + order
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
