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
                <tr>
                    <td > Pizza</td>
                    <td > ........</td>
                    <td > ........</td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
