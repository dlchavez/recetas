<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    //ingresa en web.php desde esta funcion
    public function index()
    {
        $recetas = [
            'Receta Pizza',
            'Receta  hamburguesa',
            'Receta Shawarma'
        ];

        $categoria = [
            'Italiana',
            'Ecuatoriana',
            'Arabe'
        ];
        //Maneras de enviar parametros a las vista
        //return view("recetas.index")->with('recetas',$recetas) ->with('categoria',$categoria);
        return view("recetas.index", compact('recetas','categoria'));
    }
    public function create (){
        return view('recetas.create');
    }

    public function edit ($id){

    }

    public function store (Request $request){
        //dd($request -> all());
        DB::table('recetas')
    }

    public function update(Request $request,$id){

    }

    public function destroy($id){

    }
}
