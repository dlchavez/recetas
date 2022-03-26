@extends('layouts.app');
@section('content')
<article class="contenido-receta">
    <h1 class="text-center mb-2">{{$receta->nombre}}</h1>
    <div class="receta-data">
        <img src="/storage/{{$receta->imagen}}" class="w-100">
    </div>
    <div class="receta-data">
        <p>
            <span class="font-weight-bold text-primary">Categoria:</span>
            {{$receta->categoriaReceta->nombre}}

        </p>
        <p>
            <span class="font-weight-bold text-primary">Escrito por:</span>
            {{$receta->autorReceta->name}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Fecha creación:</span>
            {{date('d-m-Y',strtotime($receta->created_at))}}
        </p>
        <div class="ingredientes">
            <h2 class="my-3 text-primary">Ingredientes</h2>
            {!!$receta->ingredientes!!}
        </div>
        <div class="preparacion">
            <h2 class="my-3 text-primary">Preparacion</h2>
            {!!$receta->preparacion!!}
        </div>
    </div>
</article>
@endsection
