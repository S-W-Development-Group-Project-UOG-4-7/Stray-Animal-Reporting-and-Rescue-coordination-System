<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Reports Routes
Route::get('/reports', function () {
    return view('reports');
});

// Rescue Operations Routes
Route::get('/rescues', function () {
    return view('rescues');
});

// Adoption Routes
Route::get('/adoptions', function () {
    return view('adoptions');
});

// User & Team Routes
Route::get('/users', function () {
    return view('users');
});

// Veterinarian Routes
Route::get('/veterinarians', function () {
    return view('veterinarians');
});

Route::get('/veterinarians/create', function () {
    return 'Add Veterinarian Page Coming Soon';
});

Route::get('/veterinarians/{id}', function ($id) {
    return "View Veterinarian: {$id}";
});

Route::get('/veterinarians/{id}/edit', function ($id) {
    return "Edit Veterinarian: {$id}";
});

// Additional vet-related routes
Route::get('/clinics', function () {
    return 'Clinics Page Coming Soon';
});

Route::get('/clinics/create', function () {
    return 'Add Clinic Page Coming Soon';
});

Route::get('/clinics/{id}', function ($id) {
    return "View Clinic: {$id}";
});

Route::get('/medical', function () {
    return 'Medical Supplies Page Coming Soon';
});

Route::get('/medical/request', function () {
    return 'Request Medical Supplies Page Coming Soon';
});

Route::get('/appointments', function () {
    return 'Appointments Page Coming Soon';
});

Route::get('/appointments/create', function () {
    return 'Create Appointment Page Coming Soon';
});

Route::get('/records', function () {
    return 'Medical Records Page Coming Soon';
});

Route::get('/records/{id}', function ($id) {
    return "View Medical Record: {$id}";
});

Route::get('/reports/medical', function () {
    return 'Medical Reports Page Coming Soon';
});

Route::get('/emergency', function () {
    return 'Emergency Contact Page Coming Soon';
});

// Other existing routes...
Route::get('/donations', function () {
    return 'Donations Page Coming Soon';
});

Route::get('/ecommerce', function () {
    return 'E-commerce Page Coming Soon';
});

Route::get('/analytics', function () {
    return 'Analytics Page Coming Soon';
});

Route::get('/settings', function () {
    return 'Settings Page Coming Soon';
});

// Support pages
Route::get('/contact', function () {
    return 'Contact Page Coming Soon';
});

Route::get('/faq', function () {
    return 'FAQ Page Coming Soon';
});

Route::get('/help', function () {
    return 'Help Page Coming Soon';
});

Route::get('/privacy', function () {
    return 'Privacy Policy Coming Soon';
});

Route::get('/activity', function () {
    return 'Activity Log Page Coming Soon';
});

Route::get('/notifications', function () {
    return 'Notifications Page Coming Soon';
});

Route::get('/logout', function () {
    return 'Logout Page Coming Soon';
});

Route::get('/profile', function () {
    return 'Profile Page Coming Soon';
});