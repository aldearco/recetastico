<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\CategoriasReceta;

class CategoriasController extends Controller
{
    public function show(CategoriasReceta $categoriaReceta){
        $recetas = Receta::where('categoria_id', $categoriaReceta->id)->paginate(9);
        return view('categorias.show', compact('recetas', 'categoriaReceta'));
    }
}
