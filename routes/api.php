<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Extra\FotoPensionController;
use App\Http\Controllers\Api\Extra\FotoUserController;
use App\Http\Controllers\Api\Extra\ReviewController;
use App\Http\Controllers\Api\Extra\ValoracionController;
use App\Http\Controllers\Api\Main\PensionController;
use App\Http\Controllers\Api\Main\ReservaController;

// solo para probar
Route::get('/users', [UserController::class, 'all']);

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register']);
Route::get('/users/{id}', [UserController::class, 'get']);

Route::middleware('auth:api')->group(function () {
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);
});


Route::post('/reservas', [ReservaController::class, 'create']);
Route::get('/reservas', [ReservaController::class, 'all']);
Route::get('/reservas/{id}', [ReservaController::class, 'get']);
Route::put('/reservas/{id}', [ReservaController::class, 'update']);
Route::delete('/reservas/{id}', [ReservaController::class, 'delete']);

Route::post('/propiedades', [PensionController::class, 'create']);
Route::get('/propiedades', [PensionController::class, 'all']);
Route::get('/propiedades/{id}', [PensionController::class, 'get']);
Route::put('/propiedades/{id}', [PensionController::class, 'update']);
Route::delete('/propiedades/{id}', [PensionController::class, 'delete']);


Route::post('/users/{id}/images', [FotoUserController::class,'subirImagen']);
Route::delete('/users/{id}/images', [FotoUserController::class,'borrarImagen']);

Route::post('/propiedades/{id}/images', [FotoPensionController::class,'subirImagen']);
Route::get('/propiedades/{id}/images', [FotoPensionController::class,'listarImagen']);
Route::delete('/propiedades/images/{img}', [FotoPensionController::class,'borrarImagen']);

Route::post('/pensiones/{id}/reviews', [ReviewController::class, 'create']);
Route::delete('/pensiones/{id}/reviews', [ReviewController::class, 'delete']);

Route::post('/pensiones/{id}/valoraciones', [ValoracionController::class, 'create']);
Route::post('/pensiones/{id}/valoraciones', [ValoracionController::class, 'delete']);

