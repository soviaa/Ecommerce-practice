<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('review.store');

    Route::middleware('role.check')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/category', [CategoryController::class, 'category'])->name('category');
        Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');

        Route::get('/products', [ProductController::class, 'getProduct'])->name('products');
        Route::get('/product', [ProductController::class, 'productForm'])->name('product');
        Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
        Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
        Route::post('/product/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
        Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');


        Route::get('/carousel', [HomeController::class, 'showCarousel'])->name('carousel');
        Route::get('/carousel/add', [HomeController::class, 'addCarousel'])->name('carousel.add');
        Route::post('/carousel/add', [HomeController::class, 'storeCarousel'])->name('carousel.store');
        Route::delete('/carousel/delete/{id}', [HomeController::class, 'destroy'])->name('carousel.destroy');
    });
});


Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

require __DIR__ . '/auth.php';
