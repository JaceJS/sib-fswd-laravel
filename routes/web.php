<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page
Route::get('/', [DashboardController::class, "landing"]);

// Dashboard
Route::get('/dashboard', [DashboardController::class, "dashboard"]) -> name('dashboard');

// Category & Products
Route::get('/category', [CategoryController::class, "index"]) -> name('category.index');
Route::get('/products', [ProductsController::class, "index"]) -> name('products.index');

// User & Role
Route::get('/users', [UsersController::class, "index"]) -> name('users.index');
Route::get('/roles', [RolesController::class, "index"]) -> name('roles.index');



