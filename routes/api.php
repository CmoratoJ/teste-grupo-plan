<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ProtectedRouteAuth;
use App\Http\Middleware\RespondWithJson;
use Illuminate\Support\Facades\Route;

Route::middleware(RespondWithJson::class)->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware(ProtectedRouteAuth::class)->group(function () {
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/permissions', PermissionController::class);
        Route::apiResource('/courses', CourseController::class);
        Route::post('/userPermission', [PermissionController::class, 'insertUserPermission']);
    });
}); 

