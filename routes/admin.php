<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VeterinarianController;
use App\Http\Controllers\Admin\EcommerceController;
use App\Http\Controllers\Admin\AdoptionManagementController;
use App\Http\Controllers\Admin\RoleRequestManagementController;
use App\Http\Controllers\Admin\DonationManagementController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');

    // Users management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Veterinarians
    Route::get('/veterinarians', [VeterinarianController::class, 'index'])->name('veterinarians.index');
    Route::get('/veterinarians/create', [VeterinarianController::class, 'create'])->name('veterinarians.create');
    Route::post('/veterinarians', [VeterinarianController::class, 'store'])->name('veterinarians.store');
    Route::delete('/veterinarians/{veterinarian}', [VeterinarianController::class, 'destroy'])->name('veterinarians.destroy');

    // E-commerce
    Route::get('/ecommerce', [EcommerceController::class, 'index'])->name('ecommerce');

    // Donations management
    Route::get('/donations', [DonationManagementController::class, 'index'])->name('donations.index');
    Route::post('/donations/{id}/update-status', [DonationManagementController::class, 'updateStatus'])->name('donations.updateStatus');

    // Adoption request management
    Route::post('/adoption-requests/{id}/approve', [AdoptionManagementController::class, 'approveRequest'])->name('adoption-requests.approve');

    // Role request management
    Route::get('/role-requests', [RoleRequestManagementController::class, 'index'])->name('role-requests.index');
    Route::post('/role-requests/{id}/approve', [RoleRequestManagementController::class, 'approve'])->name('role-requests.approve');
    Route::post('/role-requests/{id}/reject', [RoleRequestManagementController::class, 'reject'])->name('role-requests.reject');
});
