<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ===== 未登录可访问 =====
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// ===== 已登录可访问 =====
Route::middleware('auth')->group(function () {
    Route::get('/home', [AuthController::class, 'home']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // 个人中心
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/profile/edit', [AuthController::class, 'showEditProfileForm']);
    Route::put('/profile/edit', [AuthController::class, 'updateProfile']);
    Route::get('/profile/password', [AuthController::class, 'showPasswordForm']);
    Route::put('/profile/password', [AuthController::class, 'updatePassword']);
});
