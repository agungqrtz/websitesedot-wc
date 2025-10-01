<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController; // Controller untuk Dashboard

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Halaman Utama & Statis
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/layanan', [PageController::class, 'services'])->name('services');

// Route Halaman Pemesanan
Route::get('/pesan', [BookingController::class, 'create'])->name('booking.create');
Route::post('/pesan', [BookingController::class, 'store'])->name('booking.store');

// Route Dashboard (Sudah diperbaiki untuk menggunakan Controller)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk Pengguna yang Sudah Login
Route::middleware('auth')->group(function () {
    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk CRUD Pesanan
    Route::get('/pesanan/{booking}', [BookingController::class, 'show'])->name('booking.show');
    Route::get('/pesanan/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/pesanan/{booking}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/pesanan/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
});

// Route Autentikasi (Login, Register, dll.)
require __DIR__.'/auth.php';

