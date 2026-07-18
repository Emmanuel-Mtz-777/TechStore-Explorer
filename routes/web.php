<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;

Route::view('/', 'welcome');

Route::get('/products/{id}', [ProductController::class, 'getProductById'])
    ->name('products.show');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('wishlist');

    Route::post('/wishlist/add', [WishlistController::class, 'addWishlist'])
        ->name('wishlist.store');

    Route::delete('/wishlist/remove', [WishlistController::class, 'removeWishlist'])
        ->name('wishlist.destroy');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';