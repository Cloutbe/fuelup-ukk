<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Auth\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// 1. PUBLIC ROUTES (Akses Bebas)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// 2. GUEST ROUTES (Hanya untuk yang BELUM Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. AUTH ROUTES (Harus Login Dulu)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/order/checkout/{product_id}', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/order/{id}/upload', [OrderController::class, 'uploadProof'])->name('orders.upload');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');
    Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// 4. ADMIN ROUTES (Khusus Role Admin)
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class);
        Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);
        Route::get('/report/export-pdf', [\App\Http\Controllers\Admin\ReportController::class, 'exportPdf'])->name('reports.pdf');
        Route::get('/orders/{id}/print', [\App\Http\Controllers\Admin\ReportController::class, 'printReceipt'])->name('orders.print');
        Route::resource('categories', CategoryController::class)->only(['index', 'store', 'destroy']);
        Route::resource('users', UserController::class)->only(['index', 'destroy']);

    });
