@extends('layouts.app')
@section('botones')
    <a href={{route('recetas.index')}} class="btn btn-primary mr-2 text-white">Lista Recetas</a>
@endsection
@section('content')
    <h1 class="text-center mb-5">Crear Nueva Receta</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action={{route('recetas.store')}}>
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Receta</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Receta">
                </div>
                <div class="form-group">
                    <input type="submit" name="nombre" class="btn btn-primary" vvalue="Agregar Receta">
                </div>
            </form>
        </div>
    </div>
@endsection
