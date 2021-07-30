<?php

use App\Http\Controllers\{AuthController, JobListController, RepairController, ServiceController, UserController};
use Illuminate\Support\Facades\Route;

// Route API for Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:api'])->group(function () {

    // Route API for User
    Route::get('user', UserController::class);

    // Route API for Service
    Route::post('create-service', [ServiceController::class, 'store']);
    Route::put('update-service/{service}', [ServiceController::class, 'update']);
    Route::delete('delete-service/{service}', [ServiceController::class, 'destroy']);
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('services/{service}', [ServiceController::class, 'show']);

    // Route API for Repair
    Route::post('create-repair', [RepairController::class, 'store']);
    Route::put('update-repair/{repair}', [RepairController::class, 'update']);
    Route::delete('delete-repair/{repair}', [RepairController::class, 'destroy']);
    Route::get('repairs', [RepairController::class, 'index']);
    Route::get('repairs/{repair}', [RepairController::class, 'show']);

     // Route API for JobList
     Route::post('create-joblist', [JobListController::class, 'store']);
     Route::put('update-joblist/{job_list}', [JobListController::class, 'update']);
     Route::delete('delete-joblist/{job_list}', [JobListController::class, 'destroy']);
     Route::get('joblists', [JobListController::class, 'index']);
     Route::get('joblists/{job_list}', [JobListController::class, 'show']);
});
