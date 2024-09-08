<?php

use App\Http\Controllers\Api\DetalleController;
use App\Http\Controllers\Api\VehiculoController;
use App\Http\Controllers\Api\VehiculoDetalleController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('vehiculos', VehiculoController::class);
    Route::apiResource('detalles', DetalleController::class);
    Route::apiResource('vehiculo-detalles', VehiculoDetalleController::class);
});
