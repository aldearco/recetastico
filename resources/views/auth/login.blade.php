@extends('layouts.app')

@section('content')

<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Iniciar sessión</h1>

        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                placeholder="nombre@ejemplo.com">
            <label for="floatingInput">Correo electrónico</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                placeholder="Contaseña" name="password" required autocomplete="current-password">
            <label for="floatingPassword">Contraseña</label>
        </div>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Recuérdame') }}
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Acceder</button>

        @if(Route::has('password.request'))
            <a class="btn btn-link text-accent" href="{{ route('password.request') }}">
                {{ __('¿Contraseña olvidada?') }}
            </a>
        @endif
    </form>
</main>

@endsection
