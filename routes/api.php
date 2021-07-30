<?php

use App\Http\Controllers\{AuthController, ServiceController, UserController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', UserController::class);
    Route::post('create-service', [ServiceController::class, 'store']);
    Route::put('update-service/{service}', [ServiceController::class, 'update']);
    Route::delete('delete-service/{service}', [ServiceController::class, 'destroy']);
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('services/{service}', [ServiceController::class, 'show']);
});

