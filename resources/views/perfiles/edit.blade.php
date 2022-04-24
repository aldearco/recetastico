@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('buttons')
<a href="{{ route('perfiles.show', ['username'=>$perfil->usuario->username]) }}" class="nav-link d-inline-block bg-accent"><i class="fa-solid fa-angle-left mr-1"></i> Volver</a>
@endsection


@section('content')

<h1 class="text-center">Editar mi perfil</h1>


<div class="row justify-content-center mt-5">
    <div class="col-md-10 bg-white p-3">
        <form method="POST" action="{{ route('perfiles.update', ['username'=>$perfil->usuario->username]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating mb-4">
                        <input type="text" name="name" id="name" class="form-control fs-4 @error('name') is-invalid @enderror" value="{{ $perfil->usuario->name }}">
                        <label for="name">Nombre</label>
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-4">
                        <input type="text" name="surname" id="surname" class="form-control fs-4 @error('surname') is-invalid @enderror" value="{{ $perfil->usuario->surname }}">
                        <label for="surname">Apellidos</label>
                        @error('surname')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="biografia">Biografia</label>
                <input type="hidden" name="biografia" id="biografia" value="{{ $perfil->biografia }}">
                <trix-editor input="biografia" name="biografia" class="form-control @error('biografia') is-invalid @enderror"></trix-editor>
                @error('biografia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control @error('ingredientes') is-invalid @enderror" id="imagen" name="imagen">
                
                @if ( $perfil->imagen )
                <div class="mt-4">
                    <p class="mb-0">Imagen actual</p>
                    <img src="/storage/{{ $perfil->imagen }}" alt="Foto de {{ $perfil->usuario->username }}" class="w-50 rounded">
                </div>
                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @endif
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar perfil">
            </div>

            
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection