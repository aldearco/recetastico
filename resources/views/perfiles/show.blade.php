@extends('layouts.app')


@if (Auth::user()->username === $perfil->usuario->username)

@section('buttons')
<a href="{{ route('perfiles.edit', ['username'=>$perfil->usuario->username]) }}" class="nav-link d-inline-block bg-accent"><i class="fa-solid fa-pencil mr-1"></i> Editar perfil</a>
@endsection

@endif


@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-5">

            </div>
            <div class="col-md-7">
                <h2 class="text-center mb-0 text-primary">{{ $perfil->usuario->name." ".$perfil->usuario->surname }}</h2>
                <span class="h6 d-block text-center mb-2 text-secondary">{{ "@".$perfil->usuario->username}}</span>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>


@endsection