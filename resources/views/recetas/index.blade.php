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
                    <td > {{$userREceta->categoria_id}}</td>
                    <td >
                        <a href="" class="btn btn-success">Ver</a>
                        <a href="" class="btn btn-dark">Editar</a>
                        <a href="" class="btn btn-danger">Eliminar</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
