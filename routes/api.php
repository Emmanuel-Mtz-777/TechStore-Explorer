<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\RoleController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/roles', [RoleController::class, 'store']);

    Route::get('/roles', [RoleController::class, 'index']);

    Route::get('/roles/{role}', [RoleController::class, 'show']);

    Route::put('/roles/{role}', [RoleController::class, 'update']);

    Route::delete('/roles/{role}', [RoleController::class, 'destroy']);

    Route::get('/wishlist', [WishlistController::class, 'index']);

    Route::post('/wishlist', [WishlistController::class, 'store']);

    Route::delete('/wishlist', [WishlistController::class, 'destroy']);


});