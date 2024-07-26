<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::apiResource('/permissions', PermissionController::class);
