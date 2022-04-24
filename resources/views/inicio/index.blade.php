@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container nuevas-recetas">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-3">Últimas recetas</h2>
    <div class="owl-carousel owl-theme carousel-ultimas">
        @foreach ($nuevas as $nueva)
                <div class="card">
                    <a href="{{ route('recetas.show', ['receta'=>$nueva->id]) }}">
                        <img src="/storage/{{$nueva->imagen}}" alt="{{$nueva->titulo}}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h3>{{$nueva->titulo}}</h3>
                        <p>{{ Str::words(strip_tags($nueva->preparacion), 20)}}</p>
                        <div class="action-area d-flex justify-content-end">
                            <a href="{{ route('recetas.show', ['receta'=>$nueva->id]) }}" class="btn btn-primary mt-2"><i class="fa-solid fa-book-open me-1"></i> Leer receta</a>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>

<div class="container">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-3">Recetas más votadas</h2>
</div>
<div class="row">
    @foreach ($votadas as $receta)
        @include('ui.receta')
    @endforeach
</div>

@foreach ($categorias as $categoria)
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-3">{{ $categoria->nombre }}</h2>
    </div>
    <div class="row">
        @foreach ($recetas[$categoria->id] as $receta)
            @include('ui.receta')
        @endforeach
    </div>
@endforeach

@endsection
