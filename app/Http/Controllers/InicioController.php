<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriasReceta;

class InicioController extends Controller
{
    public function index(){

        // Recetas más votadas
        // $votadas = Receta::has('likes', '>', 1)->get();
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'DESC')->take(3)->get();

        //Obtener las últimas recetas
        // $nuevas = Receta::orderBy('created_at', 'DESC')->get();
        $nuevas = Receta::latest()->take(6)->get();

        // Obtener todas las categorias
        $categorias = CategoriasReceta::all();

        // Agrupar las recetas por categoría
        $recetas = [];
        foreach($categorias as $categoria){
            $recetas[ $categoria->id ] = Receta::where('categoria_id', $categoria->id )->take(3)->get();
        }

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
