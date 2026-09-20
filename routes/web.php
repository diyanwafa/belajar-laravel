<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckGuest;

Route::get('/', function () {
    return view('welcome');
});

// =====================================================
// LOGIN
// =====================================================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware(CheckGuest::class);

Route::post('/login', [AuthController::class, 'login'])
    ->middleware(CheckGuest::class);

// =====================================================
// REGISTER
// =====================================================

Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware(CheckGuest::class);

Route::post('/register', [AuthController::class, 'register'])
    ->middleware(CheckGuest::class);

// =====================================================
// LOGOUT
// =====================================================

Route::post('/logout', [AuthController::class, 'logout']);

// =====================================================
// HOME
// =====================================================

Route::get('/home', [HomeController::class, 'index'])
    ->middleware(CheckLogin::class);

// =====================================================
// ADMIN
// =====================================================

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('checkadmin');

// =====================================================
// ADMIN - USER
// =====================================================

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('checkadmin');

Route::get('/admin/users/create', [UserController::class, 'create'])
    ->middleware('checkadmin');

Route::post('/admin/users', [UserController::class, 'store'])
    ->middleware('checkadmin');

Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])
    ->middleware('checkadmin');

Route::put('/admin/users/{id}', [UserController::class, 'update'])
    ->middleware('checkadmin');

Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])
    ->middleware('checkadmin');

// =====================================================
// ADMIN - PRODUK
// =====================================================

Route::get('/admin/products', [AdminController::class, 'products'])
    ->middleware('checkadmin');

// =====================================================
// PRODUK
// =====================================================

Route::get('/products/create', [ProductController::class, 'create'])
    ->middleware(CheckLogin::class);

Route::post('/products', [ProductController::class, 'store'])
    ->middleware(CheckLogin::class);

// =====================================================
// DETAIL PRODUK
// =====================================================

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->middleware(CheckLogin::class);

// =====================================================
// EDIT PRODUK
// =====================================================

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->middleware(CheckLogin::class);

// =====================================================
// UPDATE PRODUK
// =====================================================

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->middleware(CheckLogin::class);

// =====================================================
// HAPUS PRODUK
// =====================================================

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->middleware(CheckLogin::class);