<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SlidersController;
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
Route::get('/', [LandingController::class, "index"]) -> name('landing');

// Login
Route::get('/login', [LoginController::class, "index"]) -> name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]) -> name('login.auth');
Route::post('/logout', [LoginController::class, "logout"]) -> name('logout');

// Register
Route::get('/register', [RegisterController::class, "index"]) -> name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, "store"]) -> name('register.store');

Route::middleware('auth')->group(function() {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, "dashboard"]) -> name('dashboard')->middleware('auth');

    // middleware utk role admin
    Route::middleware('role:Admin')->group(function() {
        // Sliders
        Route::get('/sliders', [SlidersController::class, 'index'])->name('sliders.index'); 
        Route::get('/sliders/create', [SlidersController::class, 'create'])->name('sliders.create'); 
        Route::post('/sliders', [SlidersController::class, 'store'])->name('sliders.store'); 
        Route::get('/sliders/edit/{id}', [SlidersController::class, 'edit'])->name('sliders.edit'); 
        Route::put('/sliders/{id}', [SlidersController::class, 'update'])->name('sliders.update'); 
        Route::delete('/sliders/{id}', [SlidersController::class, 'destroy'])->name('sliders.destroy');
    });

    // middleware utk role admin atau staff
    Route::middleware('role:Admin|Staff')->group(function() {
        // Brands
        Route::get('/brands', [BrandsController::class, "index"]) -> name('brands.index');
        Route::get('/brands/create', [BrandsController::class, "create"]) -> name('brands.create');
        Route::post('/brands', [BrandsController::class, "store"]) -> name('brands.store');
        Route::get('/brands/edit/{id}', [BrandsController::class, "edit"]) -> name('brands.edit');
        Route::put('/brands/{id}', [BrandsController::class, "update"]) -> name('brands.update'); 
        Route::delete('/brands/{id}', [BrandsController::class, "destroy"]) -> name('brands.destroy');
    });

    // middleware utk role admin atau staff
    Route::middleware('role:Admin|Staff')->group(function() {
        // Category
        Route::get('/category', [CategoryController::class, "index"]) -> name('category.index');
        Route::get('/category/create', [CategoryController::class, "create"]) -> name('category.create');
        Route::post('/category', [CategoryController::class, "store"]) -> name('category.store'); // menyimpan data
        Route::get('/category/edit/{id}', [CategoryController::class, "edit"]) -> name('category.edit'); // mengambil id dari data
        Route::put('/category/{id}', [CategoryController::class, "update"]) -> name('category.update'); 
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    // Products
    Route::get('/products', [ProductsController::class, "index"]) -> name('products.index');
    
    // middleware utk role admin atau staff
    Route::middleware('role:Admin|Staff')->group(function() {
        Route::get('/products/create', [ProductsController::class, "create"]) -> name('products.create');
        Route::post('/products', [ProductsController::class, "store"]) -> name('products.store');
        Route::get('/products/edit/{id}', [ProductsController::class, "edit"]) -> name('products.edit');
        Route::put('/products/{id}', [ProductsController::class, "update"]) -> name('products.update'); 
        Route::delete('/products/{id}', [ProductsController::class, "destroy"]) -> name('products.destroy'); 
    });
    

    // middleware utk role admin
    Route::middleware('role:Admin')->group(function() {
        // Roles
        Route::get('/roles', [RolesController::class, "index"]) -> name('roles.index');
        Route::get('/roles/create', [RolesController::class, "create"]) -> name('roles.create');
        Route::post('/roles', [RolesController::class, "store"]) -> name('roles.store');
        Route::get('/roles/edit/{id}', [RolesController::class, "edit"]) -> name('roles.edit');
        Route::put('/roles/{id}', [RolesController::class, "update"]) -> name('roles.update');
        Route::delete('/roles/{id}', [RolesController::class, "destroy"]) -> name('roles.destroy');

        // Users
        Route::get('/users', [UsersController::class, "index"]) -> name('users.index');
        Route::get('/users/create', [UsersController::class, "create"]) -> name('users.create');
        Route::post('/users', [UsersController::class, "store"]) -> name('users.store');
        Route::get('/users/edit/{id}', [UsersController::class, "edit"]) -> name('users.edit');
        Route::put('/users/{id}', [UsersController::class, "update"]) -> name('users.update');
        Route::delete('/users/{id}', [UsersController::class, "destroy"]) -> name('users.destroy');
    });
});



