<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;

// Redirect ke halaman dashboard saat akses root
Route::get('/', function () {
    return redirect()->route('home');
});

// Auth routes (login, register, dll)
Auth::routes();

// Hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route upload foto profil dashboard
    Route::post('/dashboard/upload', [App\Http\Controllers\HomeController::class, 'uploadProfileImage'])->name('dashboard.upload');
});

// Route dashboard admin (khusus admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::get('/admin/users', [App\Http\Controllers\HomeController::class, 'users'])->name('admin.users');
});
