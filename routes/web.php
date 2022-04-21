<?php

use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

/**
 * RUTAS DE RECETAS
 */
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
Route::get('/receta/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
Route::get('/receta/{receta}/edit', [RecetaController::class, 'edit'])->name('recetas.edit');
Route::put('/receta/{receta}', [RecetaController::class, 'update'])->name('recetas.update');
Route::delete('/receta/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');

Route::get('/user/{username}', [PerfilController::class, 'show'])->name('perfiles.show');
Route::get('/user/{username}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
