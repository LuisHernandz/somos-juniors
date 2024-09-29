<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VacanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/vacantes', VacanteController::class);
Route::apiResource('/usuarios', UsersController::class);
Route::post('/login', [SessionsController::class, 'store']);
// Route::apiResource('/login', SessionsController::class);

Route::post('/login', [AuthController::class, 'login']);