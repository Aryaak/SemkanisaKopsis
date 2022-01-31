<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;


// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('details', [UserController::class, 'details']);

    Route::post('order/store', [OrderController::class, 'store']);

    Route::get('product/get-for-home', [ProductController::class, 'getForHome']);
    Route::get('product/get-related', [ProductController::class, 'getRelated']);
    Route::get('product/get-by-category', [ProductController::class, 'getByCategory']);
});
