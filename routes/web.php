<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/supir', SupirController::class);
    Route::resource('/mobil', MobilController::class);
    Route::resource('/jadwal', JadwalController::class);
});

require __DIR__ . '/auth.php';
