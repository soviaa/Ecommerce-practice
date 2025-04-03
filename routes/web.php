<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

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

        Route::post('/send-mail', [AdminController::class, 'sendMail'])->name('send.mail');
    });
});


Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Route::get('/palindrome/{number}',[Controller::class,'isPalindrome']);
// Route::get('/length/{word}',[Controller::class,'length']);
// Route::get('/domain',[Controller::class,'checkDomain']);


Route::get('/user/{user}/role/{role}',[AdminController::class,'assignRole'])->name('user.role');






require __DIR__ . '/auth.php';
