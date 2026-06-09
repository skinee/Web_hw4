<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ===== 未登录可访问 =====
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// ===== 已登录可访问 =====
Route::middleware('auth')->group(function () {
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // 个人中心
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [AuthController::class, 'showEditProfileForm'])->name('profile.edit');
    Route::put('/profile/edit', [AuthController::class, 'updateProfile']);
    Route::get('/profile/password', [AuthController::class, 'showPasswordForm'])->name('profile.password');
    Route::put('/profile/password', [AuthController::class, 'updatePassword']);

    // 头像上传
    Route::post('/profile/avatar', [AuthController::class, 'uploadAvatar'])->name('profile.avatar');
});
