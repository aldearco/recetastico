@extends('layouts.app')

@section('buttons')

<a href="{{ route('recetas.create') }}" class="nav-link d-inline-block bg-accent"><i class="fa-solid fa-pen-to-square mr-1"></i> Crear receta</a>

@endsection


@section('content')

<h2 class="text-center mb-5">Administra tus recetas</h2>
<div class="swal2-box">
    
</div>
<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-accent text-light">
            <th scole="col">Título</th>
            <th scole="col">Categoría</th>
            <th scole="col" class="text-end">Acciones</th>
        </thead>
        <tbody>
            @foreach($recetas as $receta)
                <tr>
                    <td>{{ $receta->titulo }}</td>
                    <td>{{ $receta->categoria->nombre }}</td>
                    <td class="d-flex flex-row-reverse">
                            
                            <div class="btn-group">
                                <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-info" data-bs-toggle="tooltip" title="Ver"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-warning" data-bs-toggle="tooltip" title="Editar"><i class="fa-solid fa-pencil"></i></a>
                                <eliminar-receta receta-id="{{ $receta->id }}"></eliminar-receta>
                            </div>
                            
                        
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection

