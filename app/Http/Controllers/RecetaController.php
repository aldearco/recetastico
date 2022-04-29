<?php

namespace App\Http\Controllers;

use App\Models\CategoriasReceta;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $recetas = auth()->user()->recetas;
        $usuario = auth()->user();

        // Recetas con paginación
        $recetas = Receta::where('user_id', $usuario->id)->paginate(12);

        return view('recetas.index', compact('recetas', 'usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener las categorías (sin modelo)
        // $categorias = DB::table('categorias_recetas')->get()->pluck('nombre','id');
        
        // Obtener las categorías (con modelo)
        $categorias = CategoriasReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request['imagen']->store('upload-recetas', 'public'));

        // VALIDACIÓN
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
        ]);

        // OBTENER RUTA DE IMAGEN
        $fecha = Carbon::now();
        $ruta_imagen = $request['imagen']->store('upload-recetas/'.$fecha->year.'/'.$fecha->month, 'public');

        // RESIZE DE IMAGEN
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        // ALMACENAR EN LA BASE DE DATOS (SIN MODELO)
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'preparacion' => $data['preparacion'],
        //     'ingredientes' => $data['ingredientes'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']
        // ]);

        // ALMACENAR EN LA BASE DE DATOS (CON MODELO)
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']   
        ]);
        
        // REDIRECCIONAR
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        // Obtener si el usuario actual le gusta la receta y está logeado
        $like = ( auth()->user() ) ? auth()->user()->meGusta->contains($receta->id) : false;

        // Pasa la cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show', compact('receta', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        // Revisar el Policy de Recetas
        $this->authorize('view', $receta);
        
        $categorias = CategoriasReceta::all(['id', 'nombre']);

        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        // Revisar el Policy de Recetas
        $this->authorize('update', $receta);

        // VALIDACIÓN
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        // Asignar los valores a Receta
        $receta->titulo = $data['titulo'];
        $receta->categoria_id = $data['categoria'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];

        // - Si el usuario sube una nueva imagen
       if(request('imagen')){
            $fecha = Carbon::now();
            $ruta_imagen = $request['imagen']->store('upload-recetas/'.$fecha->year.'/'.$fecha->month, 'public');

            // - RESIZE DE IMAGEN
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();

            // - Asignar ruta de imagen
            $receta->imagen = $ruta_imagen;
       }

        $receta->save();
        

        // REDIRECCIONAR
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // Revisar el Policy de Recetas
        $this->authorize('delete', $receta);

        // Eliminar la receta
        $receta->delete();

        return redirect()->action([RecetaController::class, 'index']);
    }


    public function search(Request $request){
        // $busqueda = $request['buscar'];
        $busqueda = $request->get('buscar');

        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(12);
        $recetas->appends(['buscar'=>$busqueda]);

        return view('busquedas.show', compact('recetas', 'busqueda'));
    }
}
