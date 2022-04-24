@extends('layouts.app')


@if ((isset(Auth::user()->username) && isset($perfil->usuario->username)) && Auth::user()->username === $perfil->usuario->username)

@section('buttons')
<a href="{{ route('perfiles.edit', ['username'=>$perfil->usuario->username]) }}" class="nav-link d-inline-block bg-accent"><i class="fa-solid fa-pencil mr-1"></i> Editar perfil</a>
@endsection

@endif


@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagen)
                <img src="/storage/{{ $perfil->imagen }}" alt="Foto de {{ $perfil->usuario->username }}" class="w-100 rounded-circle">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-0 text-primary">{{ $perfil->usuario->name." ".$perfil->usuario->surname }}</h2>
                <span class="h6 d-block text-center mb-2 text-secondary">{{ "@".$perfil->usuario->username}}</span>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5">Recetas creadas por {{ $perfil->usuario->name }}</h2>
    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if ( count($recetas) > 0 )
                @foreach ($recetas as $receta)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/{{ $receta->imagen }}" class="card-img-top" alt="{{ $receta->titulo }}">
                            <div class="card-body">
                                <h3>{{ $receta->titulo }}</h3>
                                <div class="action-area d-flex justify-content-end">
                                    <a href="{{ route('recetas.show', ['receta'=>$receta->id]) }}" class="btn btn-primary mt-2"><i class="fa-solid fa-book-open me-1"></i> Leer receta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center w-100">Aún no hay recetas...</p>
            @endif
        </div>
        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $recetas->links() }}
        </div>
    </div>


@endsection