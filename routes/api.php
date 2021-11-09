<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;


// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('details', [UserController::class, 'details']);
});
