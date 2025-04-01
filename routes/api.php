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


Route::get('/marcas', action: [MarcasController::class, 'todos']);
Route::get('/marcas/{id}', action: [MarcasController::class, 'item']);
Route::post('/marcas/create', action: [MarcasController::class, 'create']);


Route::get('/gamas', action: [GamasController::class, 'todos']);
Route::get('/gamas/{id}', action: [GamasController::class, 'item']);
Route::post('/gamas/create', action: [GamasController::class, 'create']);

