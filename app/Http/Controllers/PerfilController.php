<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $perfil = Perfil::find($user->id);
        $recetas = Receta::where('user_id', $user->id)->paginate(6);
        return view('perfiles.show', compact('perfil', 'recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        $perfil = Perfil::find($user->id);

        // Ejecutar el Policy
        $this->authorize('update', $perfil);

        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // Seleccionar perfil
        $user = User::where('username', '=', $username)->firstOrFail();
        $perfil = Perfil::find($user->id);

        // Ejecutar el Policy
        $this->authorize('update', $perfil);

        // Validar
        $data = request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'biografia' => 'required'
        ]);

        // Si el usuario sube una imagen
        if( $request['imagen']){
            // OBTENER RUTA DE IMAGEN
            $fecha = Carbon::now();
            $ruta_imagen = $request['imagen']->store('upload-perfiles/'.$fecha->year.'/'.$fecha->month, 'public');

            // RESIZE DE IMAGEN
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            // CREAR ARREGLO IMAGEN
            $array_imagen = ['imagen'=> $ruta_imagen];
        }


        // Asignar nombre y apellidos
        auth()->user()->name = $data['name'];
        auth()->user()->surname = $data['surname'];
        auth()->user()->save();

        unset($data['name']);
        unset($data['surname']);

        // Asignar biografia e imagen
        auth()->user()->perfil()->update(
            array_merge($data, $array_imagen ?? [])
        );

        // Guardar información

        // Redireccionar
        return redirect()->route('perfiles.show', ['username'=>auth()->user()->username]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}