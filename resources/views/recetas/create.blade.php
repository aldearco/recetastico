@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('buttons')

<a href="{{ route('recetas.index') }}" class="nav-link d-inline-block bg-accent"><i class="fa-solid fa-angle-left mr-1"></i> Volver</a>

@endsection


@section('content')

<h2 class="text-center mb-5">Crear nueva receta</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-floating mb-4">
                <input type="text" name="titulo" id="titulo" class="form-control fs-4 @error('titulo') is-invalid @enderror" autofocus value="{{ old('titulo') }}">
                <label for="titulo">Título de la receta</label>
                @error('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="categoria">Categoría</label>
                <div class="input-group">
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
                        <option disabled selected value="">Selecciona...</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="preparacion">Preparación</label>
                <input type="hidden" name="preparacion" id="preparacion" value="{{ old('preparacion') }}">
                <trix-editor input="preparacion" name="preparacion" class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>
                @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="ingredientes">Ingredientes</label>
                <input type="hidden" name="ingredientes" id="ingredientes" value="{{ old('ingredientes') }}">
                <trix-editor input="ingredientes" name="ingredientes" class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>
                @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="imagen">Imagen de la receta</label>
                <input type="file" class="form-control @error('ingredientes') is-invalid @enderror" id="imagen" name="imagen">
                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar receta">
            </div>
        </form>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
