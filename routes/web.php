<?php
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MovilesController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\GamasController;

use Illuminate\Support\Facades\Route;

// ruta simple
/*Route::get('/', function () {
    return view('home');
});*/

//compuesta 
Route::get('/', action: [InicioController::class, 'index'])->name('home');
Route::get('/movil', action: [MovilesController::class, 'index'])->name('movil');
Route::get('/marca', [MarcasController::class, 'index'])->name('marca');
Route::get('/gama', [GamasController::class, 'index'])->name('gama');

Route::get('/movil/agregar', action: [MovilesController::class, 'agregar'])->name('movil.agregar');
Route::get('/movil/{id}', action: [MovilesController::class, 'item'])->name('movil.item');
Route::get('/movil/{id}/modificar', action: [MovilesController::class, 'modificar'])->name('movil.modificar');
Route::post('/movil/borrar', action: [MovilesController::class, 'delete'])->name('movil.kranky');


Route::get('/marca/agregar', action: [MarcasController::class, 'agregar'])->name('marca.agregar');
Route::get('/marca/{id}', action: [MarcasController::class, 'item'])->name('marca.item');
Route::get('/marca/{id}/modificar', action: [MarcasController::class, 'modificar'])->name('marca.modificar');
Route::post('/marca/borrar', action: [MarcasController::class, 'delete'])->name('marca.kranky');


Route::get('/gama/agregar', [GamasController::class, 'agregar'])->name('gama.agregar');
Route::get('/gama/{id}', [GamasController::class, 'item'])->name('gama.item');
Route::get('/gama/{id}/modificar', [GamasController::class, 'modificar'])->name('gama.modificar');
Route::post('/gama/borrar', action: [GamasController::class, 'delete'])->name('gama.kranky');

Route::post('/movil/agregar', [MovilesController::class, 'store'])->name('movil.store');
Route::post('/movil/{id}/actualizar', [MovilesController::class, 'update'])->name('movil.update');
Route::post('/marca/agregar', [MarcasController::class, 'store'])->name('marca.store');
Route::post('/marca/{id}/actualizar', [MarcasController::class, 'update'])->name('marca.update');
Route::post('/gama/agregar', [GamasController::class, 'store'])->name('gama.store');
Route::post('/gama/{id}/actualizar', [GamasController::class, 'update'])->name('gama.update');



// compleja
// to be continued...