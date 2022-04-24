<div class="col-md-4">
    <div class="card shadow">
        <a href="{{ route('recetas.show', ['receta'=>$receta->id]) }}">
            <img src="/storage/{{$receta->imagen}}" alt="{{$receta->titulo}}" class="card-img-top">
        </a>
        <div class="card-body">
            <h3>{{$receta->titulo}}</h3>
            <div class="meta-receta d-flex justify-content-between">
                @php
                    $fecha = $receta->created_at;
                @endphp
                <p class="text-primary fecha"><fecha-receta fecha="{{ $fecha }}"></fecha-receta></p>
                <p class="likes"><i class="fa-solid fa-heart"></i> {{ count($receta->likes)}}</p>
            </div>
            <p>{{ Str::words(strip_tags($receta->preparacion), 20)}}</p>
            <div class="action-area d-flex justify-content-end">
                <a href="{{ route('recetas.show', ['receta'=>$receta->id]) }}" class="btn btn-primary mt-2"><i class="fa-solid fa-book-open me-1"></i> Leer receta</a>
            </div>
        </div>
    </div>
</div>