<?php

use App\Http\Controllers\Api\MovilesController;
use App\Http\Controllers\Api\MarcasController;
use App\Http\Controllers\Api\GamasController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/moviles', action: [MovilesController::class, 'todos']);
Route::get('/moviles/{id}', action: [MovilesController::class, 'item']);
Route::post('/moviles/create', action: [MovilesController::class, 'create']);
Route::put('/moviles/update/{id}', action: [MovilesController::class, 'update']);
Route::delete('/moviles/delete', action: [MovilesController::class, 'delete']);


Route::get('/marcas', action: [MarcasController::class, 'todos']);
Route::get('/marcas/{id}', action: [MarcasController::class, 'item']);
Route::post('/marcas/create', action: [MarcasController::class, 'create']);
Route::put('/marcas/update', action: [MarcasController::class, 'update']);
Route::delete('/marcas/delete', action: [MarcasController::class, 'delete']);



Route::get('/gamas', action: [GamasController::class, 'todos']);
Route::get('/gamas/{id}', action: [GamasController::class, 'item']);
Route::post('/gamas/create', action: [GamasController::class, 'create']);
Route::put('/gamas/update/{id}', action: [GamasController::class, 'update']);
Route::delete('/gamas/delete', action: [GamasController::class, 'delete']);


