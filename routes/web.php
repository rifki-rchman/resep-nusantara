<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

// 🔹 Public Routes
Route::get('/', [ResepController::class, 'index'])->name('home');


Route::get('/reseps', [ResepController::class, 'index'])->name('reseps.index');
Route::get('/reseps/{resep}', [ResepController::class, 'show'])
    ->whereNumber('resep')
    ->name('reseps.show');

// 🔹 Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// 🔹 Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('reseps', ResepController::class)->except(['index', 'show']);
    Route::resource('kategoris', KategoriController::class)->except(['show']);
});
