<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthorizationRoute;
use App\Http\Middleware\ProtectedRouteAuth;
use App\Http\Middleware\RespondWithJson;
use Illuminate\Support\Facades\Route;

Route::middleware(RespondWithJson::class)->group(function () {
    //AUTH
    Route::post('/login', [AuthController::class, 'login']);

    //PROTECTED ROUTES
    Route::middleware(ProtectedRouteAuth::class)->group(function () {

        //USER
        Route::controller(UserController::class)->group(function () {
            Route::middleware(AuthorizationRoute::class)->group(function () {
                Route::post('/users', 'store');
                Route::put('/users/{id}', 'update');
                Route::delete('/users/{id}', 'destroy');
            });
            Route::get('/users', 'index');
            Route::get('/users/{id}', 'show');
        });
        
        //PERMISSION
        Route::controller(PermissionController::class)->group(function () {
            Route::middleware(AuthorizationRoute::class)->group(function () {
                Route::post('/permissions', 'store');
                Route::put('/permissions/{id}', 'update');
                Route::delete('/permissions/{id}', 'destroy');
                Route::post('/userPermission', 'insertUserPermission');
            });
            Route::get('/permissions', 'index');
            Route::get('/permissions/{id}', 'show');
        });

        //COURSES
        Route::controller(CourseController::class)->group(function () {
            Route::middleware(AuthorizationRoute::class)->group(function () {
                Route::post('/courses', 'store');
                Route::put('/courses/{id}', 'update');
                Route::delete('/courses/{id}', 'destroy');
                Route::post('/addUserInCourse', 'addUserInCourse');
            });
            Route::get('/courses', 'index');
            Route::get('/courses/{id}', 'show');
        });
    });
}); 

