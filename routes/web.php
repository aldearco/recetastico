<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LikesController;
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

Route::get('/', [InicioController::class, 'index'])->name('inicio.index');

/**
 * Rutas de recetas
 */
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
Route::get('/receta/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
Route::get('/receta/{receta}/edit', [RecetaController::class, 'edit'])->name('recetas.edit');
Route::put('/receta/{receta}', [RecetaController::class, 'update'])->name('recetas.update');
Route::delete('/receta/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');

/**
 * Buscador de recetas
 */
Route::get('/buscar', [RecetaController::class, 'search'])->name('buscar.show');

/**
 * Rutas de categorias
 */
Route::get('/categoria/{categoriaReceta}', [CategoriasController::class, 'show'])->name('categorias.show');

/**
 * Rutas de usuarios
 */
Route::get('/user/{username}', [PerfilController::class, 'show'])->name('perfiles.show');
Route::get('/user/{username}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');
Route::put('/user/{username}', [PerfilController::class, 'update'])->name('perfiles.update');


/**
 * Rutas de likes
 */
Route::post('receta/{receta}', [LikesController::class, 'update'])->name('likes.update');


/**
 * Rutas de autenticación
 */
Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
