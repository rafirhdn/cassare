<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;

// Login
Route::post('/login', [AuthenticationController::class, 'login']);
// Verify Email
Route::post('/verifyEmail', [AuthenticationController::class, 'verifyEmail']);
// Verify Otp
Route::post('/verifyOtp', [AuthenticationController::class, 'verifyOtp']);
// Change Password
Route::post('/changePassword', [AuthenticationController::class, 'changePassword']);

Route::middleware('auth:sanctum')->group(function () {
    // Unblock
    Route::post('/unblock', [AuthenticationController::class, 'unblock']);
    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // Category
    Route::prefix('category')->group(function () {
        // Index
        Route::get('/index', [CategoryController::class, 'index']);
        // Store
        Route::post('/store', [CategoryController::class, 'store']);
        // Show
        Route::post('/show', [CategoryController::class, 'show']);
        // Update
        Route::post('/update', [CategoryController::class, 'update']);
        // Destroy
        Route::post('/destroy', [CategoryController::class, 'destroy']);
    });

    // Product
    Route::prefix('product')->group(function () {
        // Index
        Route::get('/index', [ProductController::class, 'index']);
        // Store
        Route::post('/store', [ProductController::class, 'store']);
        // Show
        Route::post('/show', [ProductController::class, 'show']);
        // Update
        Route::post('/update', [ProductController::class, 'update']);
        // Destroy
        Route::post('/destroy', [ProductController::class, 'destroy']);
    });

    // Cart
    Route::prefix('cart')->group(function () {
        // Index
        Route::get('/index', [CartController::class, 'index']);
        // Store
        Route::post('/store', [CartController::class, 'store']);
        // Destroy
        Route::post('/destroy', [CartController::class, 'destroy']);
    });

    // Admin
    Route::prefix('admin')->group(function () {
        // Index
        Route::get('/index', [AdminController::class, 'index']);
        // Store
        Route::post('/store', [AdminController::class, 'store']);
        // Show
        Route::post('/show', [AdminController::class, 'show']);
        // Update
        Route::post('/update', [AdminController::class, 'update']);
        // Destroy
        Route::post('/destroy', [AdminController::class, 'destroy']);
    });
});
