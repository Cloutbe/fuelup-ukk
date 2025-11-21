<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
// 👇 1. PENTING: Tambahkan baris ini agar Laravel mengenali AdminController
use App\Http\Controllers\Admin\AdminController;

// === PUBLIC ROUTES (Bisa diakses siapa saja) ===
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);

// === AUTH ROUTES (Hanya Tamu/Guest) ===
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// === LOGOUT (Harus Login Dulu) ===
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// === USER ROUTES (Hanya User Biasa) ===
// Middleware role:user memastikan admin tidak masuk sini (opsional)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);
    Route::get('/cart', [HomeController::class, 'cart']);
});

// === ADMIN ROUTES (KHUSUS ADMIN) ===
// 👇 2. Disini kita menyambungkan URL '/admin/dashboard'
// Middleware role:admin memastikan HANYA admin yang bisa masuk
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
});