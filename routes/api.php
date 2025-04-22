<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\UserController;

// solo para probar
Route::get('/users', [UserController::class, 'get_all']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register']);
Route::get('/users/{id}', [UserController::class, 'get']);

Route::middleware('auth:api')->group(function () {
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);
});
