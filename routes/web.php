<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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
Route::get('/', [LandingController::class, "index"]) -> name('landing')->middleware('web');
Route::get('/category/{id}', [LandingController::class, 'show'])->name('show');
Route::get('/about', [LandingController::class, "about"]) -> name('about');
Route::get('/contact', [LandingController::class, "contact"]) -> name('contact');

// Show Product
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');

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

    // middleware utk role admin atau staff
    Route::middleware('role:Admin|Staff')->group(function() {
        // Sliders
        Route::get('/slider', [SliderController::class, 'index'])->name('slider.index'); 
        Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create'); 
        Route::post('/slider', [SliderController::class, 'store'])->name('slider.store'); 
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit'); 
        Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update'); 
        Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    // midlleware status utk role admin
    Route::middleware('role:Admin')->group(function() {
        Route::put('/slider/approve/{id}', [sliderController::class, "approve"]) -> name('slider.approve');
        Route::put('/slider/reject/{id}', [sliderController::class, "reject"]) -> name('slider.reject'); 
    });

    // middleware utk role admin atau staff
    Route::middleware('role:Admin|Staff')->group(function() {
        // Brands
        Route::get('/brand', [BrandController::class, "index"]) -> name('brand.index');
        Route::get('/brand/create', [BrandController::class, "create"]) -> name('brand.create');
        Route::post('/brand', [BrandController::class, "store"]) -> name('brand.store');
        Route::get('/brand/edit/{id}', [BrandController::class, "edit"]) -> name('brand.edit');
        Route::put('/brand/{id}', [BrandController::class, "update"]) -> name('brand.update'); 
        Route::delete('/brand/{id}', [BrandController::class, "destroy"]) -> name('brand.destroy');
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
    Route::get('/product', [ProductController::class, "index"]) -> name('product.index');
    
    // middleware utk role admin atau staff
    Route::middleware('role:Admin|Staff')->group(function() {
        Route::get('/product/create', [ProductController::class, "create"]) -> name('product.create');
        Route::post('/product', [ProductController::class, "store"]) -> name('product.store');
        Route::get('/product/edit/{id}', [ProductController::class, "edit"]) -> name('product.edit');
        Route::put('/product/{id}', [ProductController::class, "update"]) -> name('product.update'); 
        Route::delete('/product/{id}', [ProductController::class, "destroy"]) -> name('product.destroy');                 
    });
    // midlleware status utk role admin
    Route::middleware('role:Admin')->group(function() {
        Route::put('/product/approve/{id}', [ProductController::class, "approve"]) -> name('product.approve');
        Route::put('/product/reject/{id}', [ProductController::class, "reject"]) -> name('product.reject'); 
    });


    // middleware utk role admin
    Route::middleware('role:Admin')->group(function() {
        // Roles
        Route::get('/role', [RoleController::class, "index"]) -> name('role.index');
        Route::get('/role/create', [RoleController::class, "create"]) -> name('role.create');
        Route::post('/role', [RoleController::class, "store"]) -> name('role.store');
        Route::get('/role/edit/{id}', [RoleController::class, "edit"]) -> name('role.edit');
        Route::put('/role/{id}', [RoleController::class, "update"]) -> name('role.update');
        Route::delete('/role/{id}', [RoleController::class, "destroy"]) -> name('role.destroy');

        // Users
        Route::get('/user', [UserController::class, "index"]) -> name('user.index');
        Route::get('/user/create', [UserController::class, "create"]) -> name('user.create');
        Route::post('/user', [UserController::class, "store"]) -> name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, "edit"]) -> name('user.edit');
        Route::put('/user/{id}', [UserController::class, "update"]) -> name('user.update');
        Route::delete('/user/{id}', [UserController::class, "destroy"]) -> name('user.destroy');
    });
});



