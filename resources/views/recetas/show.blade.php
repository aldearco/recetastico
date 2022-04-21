@extends('layouts.app')


@section('content')

<article class="contenido-receta">
    <h1 class="text-center mb-4">
        {{ $receta->titulo }}
    </h1>
    <div class="imagen-receta">
        <img src="/storage/{{ $receta->imagen }}" class="w-100" alt="">
    </div>
    <div class="receta-meta mt-2">
        <p>
            <span class="font-weight-bold text-primary">Escrito en:</span>
            {{ $receta->categoria->nombre }}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Autor:</span>
            {{ $receta->autor->username }}
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

</article>

@endsection