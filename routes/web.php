<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class, 'index'])
    ->name('welcome');

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
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');

})->middleware('auth')->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

require __DIR__.'/auth.php';