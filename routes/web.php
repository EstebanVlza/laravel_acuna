<?php
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MovilController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\GamaController;

use Illuminate\Support\Facades\Route;

// ruta simple
/*Route::get('/', function () {
    return view('home');
});*/

//compuesta 
Route::get('/', action: [InicioController::class, 'index'])->name('home');
Route::get('/movil', action: [MovilController::class, 'index'])->name('movil');
Route::get('/marca', [MarcaController::class, 'index'])->name('marca');
Route::get('/gama', [GamaController::class, 'index'])->name('gama');

Route::get('/movil/agregar', action: [MovilController::class, 'agregar'])->name('movil.agregar');
Route::get('/movil/{id}', action: [MovilController::class, 'item'])->name('movil.item');
Route::get('/movil/{id}/modificar', action: [MovilController::class, 'modificar'])->name('movil.modificar');

Route::get('/marca/agregar', action: [MarcaController::class, 'agregar'])->name('marca.agregar');
Route::get('/marca/{id}', action: [MarcaController::class, 'item'])->name('marca.item');
Route::get('/marca/{id}/modificar', action: [MarcaController::class, 'modificar'])->name('marca.modificar');

Route::get('/gama/agregar', [GamaController::class, 'agregar'])->name('gama.agregar');
Route::get('/gama/{id}', [GamaController::class, 'item'])->name('gama.item');
Route::get('/gama/{id}/modificar', [GamaController::class, 'modificar'])->name('gama.modificar');

Route::post('/movil/agregar', [MovilController::class, 'store'])->name('movil.store');
Route::post('/movil/{id}/actualizar', [MovilController::class, 'update'])->name('movil.update');
Route::post('/marca/agregar', [MarcaController::class, 'store'])->name('marca.store');
Route::post('/marca/{id}/actualizar', [MarcaController::class, 'update'])->name('marca.update');
Route::post('/gama/agregar', [GamaController::class, 'store'])->name('gama.store');
Route::post('/gama/{id}/actualizar', [GamaController::class, 'update'])->name('gama.update');



// compleja
// to be continued...