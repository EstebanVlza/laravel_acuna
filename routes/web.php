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

// compleja
// to be continued...