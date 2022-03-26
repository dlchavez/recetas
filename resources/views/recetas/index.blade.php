@extends('layouts.app')
@section('botones')
    <a href="/recetas/create" class="btn btn-primary mr-2 text-white">Crear Recetas</a>
@endsection
@section('content')
    <h1 class="text-center mb-5">Administra tus recetas</h1>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col"> Nombre</th>
                    <th scole="col"> Categoria</th>
                    <th scole="col"> Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($userRecetas as $userREceta )
                <tr>
                    <td > {{$userREceta->nombre}}</td>
                    <td > {{$userREceta->categoriaReceta->nombre}}</td>
                    <td >
                        <a href="{{route('recetas.show',['receta'=>$userREceta->id])}}" class="btn btn-success d-block mb-1">Ver</a>
                        <a href="{{route('recetas.edit',['receta'=>$userREceta->id])}}" class="btn btn-dark  d-block mb-1">Editar</a>
                        <eliminar-receta receta-id={{$userREceta->id}}></eliminar-receta>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
