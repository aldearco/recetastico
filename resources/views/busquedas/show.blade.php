@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="titulo-categoria text-primary mt-5 mb-4">Has buscado por: {{ $busqueda }}</h2>
</div>

<div class="row">
    @foreach ($recetas as $receta)
        @include('ui.receta')
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5">
    {{ $recetas->links() }}
</div>
@endsection