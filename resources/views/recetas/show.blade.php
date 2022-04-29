@extends('layouts.app')


@section('content')

<article class="contenido-receta bg-white p-3 p-sm-5 shadow">
    <h1 class="text-center mb-4">
        {{ $receta->titulo }}
    </h1>
    <div class="imagen-receta">
        <img src="/storage/{{ $receta->imagen }}" class="w-100" alt="">
    </div>
    <div class="receta-meta mt-3">
        <p>
            <span class="font-weight-bold text-primary">Escrito en:</span>
            <a href="{{ route('categorias.show', ['categoriaReceta'=>$receta->categoria->id]) }}">
                {{ $receta->categoria->nombre }}
            </a>
        </p>
        <p>
            <span class="font-weight-bold text-primary">Autor:</span>
            <a href="{{ route('perfiles.show', ['username'=>$receta->autor->username]) }}">
                {{ $receta->autor->username }}
            </a>
            
        </p>
        <p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $receta->created_at;
            @endphp
            <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
        </p>

        

    </div>
    <div class="ingredientes">
        <h2 class="my-3 text-primary">Ingredientes</h2>
        {!! $receta->ingredientes !!}
    </div>
    <div class="preparacion">
        <h2 class="my-3 text-primary">Preparación</h2>
        {!! $receta->preparacion !!}
    </div>

    <div class="col-12 mt-3 d-flex justify-content-center">
        <like-button receta-id="{{ $receta->id }}" like="{{ $like }}" likes="{{ $likes }}"></like-button>
    </div>

</article>

@endsection