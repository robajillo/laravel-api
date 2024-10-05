<?php

use Illuminate\Support\Facades\Route;  // Add this line to import the Route facade
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::post('login', [AuthController::class, 'login']);

// Public route for products
Route::get('products', [ProductController::class, 'index']);

// Protected route for customers
Route::middleware('auth:api')->get('customers', [CustomerController::class, 'index']);


// "fruitcake/laravel-cors": "^2.0",
