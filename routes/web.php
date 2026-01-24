<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\ObservasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BioGuardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SpeciesController;

Route::get('/', [HomeController::class, 'index']);

// Guest Routes (Login/Register)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    
    // Forgot Password Routes
    Route::get('forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    // Generic Dashboard Redirect
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Shared Routes (Accessible by both Admin and User)
    Route::middleware('role:admin,warga,jagawana')->group(function () {
        // spesies route
        Route::get('/spesies', [SpeciesController::class, 'index'])->name('spesies');

        // observasi routes
        Route::get('/observasi', [ObservasiController::class, 'observasi'])->name('observasi');
        Route::get('/observasi/create', [ObservasiController::class, 'create'])->name('observasi.create');
        Route::post('/observasi', [ObservasiController::class, 'store'])->name('observasi.store');

        // profile routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // General Report Redirect (Smart Route)
        Route::get('/laporan', [LaporanController::class, 'generalIndex'])->name('laporan');
    });

    // Admin Dashboard
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // User Management
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/users/{id}/role', [AdminController::class, 'updateRole'])->name('admin.users.update-role');
        
        // Forum Diskusi / Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    });

    // Warga Routes
    Route::middleware('role:warga')->prefix('warga')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'wargaDashboard'])->name('warga.dashboard');
        Route::get('/laporan', [LaporanController::class, 'wargaIndex'])->name('warga.laporan');
    });

    // Jagawana Routes
    Route::middleware('role:jagawana')->prefix('jagawana')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'jagawanaDashboard'])->name('jagawana.dashboard');
        Route::get('/laporan', [LaporanController::class, 'jagawanaIndex'])->name('jagawana.laporan');
        Route::get('/laporkan', [LaporanController::class, 'create'])->name('jagawana.laporkan');
        Route::post('/laporkan', [LaporanController::class, 'store'])->name('jagawana.laporkan.store');
    });

});

// Public BioGuard & Map Routes (Accessible to everyone)
Route::prefix('bioguard')->group(function () {
    Route::get('/flora', [BioGuardController::class, 'flora'])->name('bioguard.flora');
    Route::get('/fauna', [BioGuardController::class, 'fauna'])->name('bioguard.fauna');
    Route::get('/bio-ai', [BioGuardController::class, 'bioAi'])->name('bioAi');
});
Route::get('/peta', [BioGuardController::class, 'peta'])->name('peta');
