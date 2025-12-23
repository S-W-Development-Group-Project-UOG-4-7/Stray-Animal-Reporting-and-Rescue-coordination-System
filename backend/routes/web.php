<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RescueController;
use App\Models\Rescue; 

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes...
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rescue Team Routes
Route::prefix('rescue')->name('rescue.')->group(function () {


Route::get('/dashboard', function () {
    $rescues = Rescue::all();
    return view('rescue-team', compact('rescues'));
})->name('dashboard');


    Route::get('/reports', function () {
        return view('rescue-reports');
    })->name('reports');

    Route::get('/assignments', function () {
        return view('rescue-assignments');
    })->name('assignments');

    Route::get('/animals', function () {
        return view('rescue-animals');
    })->name('animals');

    Route::get('/adoptions', function () {
        return view('rescue-adoptions');
    })->name('adoptions');

    // ✅ Add edit/update routes here
    Route::get('/{id}/edit', [RescueController::class, 'edit'])->name('edit');
    Route::put('/{id}', [RescueController::class, 'update'])->name('update');
});
