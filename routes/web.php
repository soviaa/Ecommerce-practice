<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role.check')->group(function () {
        Route::get('/category', [CategoryController::class, 'category'])->name('category');
        Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');

        Route::get('/products', [ProductController::class, 'getProduct'])->name('products');
        Route::get('/product', [ProductController::class, 'productForm'])->name('product');
        Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
        Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
        Route::post('/product/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
        Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    });
});
require __DIR__.'/auth.php';
