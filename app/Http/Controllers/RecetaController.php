<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    //Constructor
    public function __construct()
    {
        $this->middleware('auth',['except' =>'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //capturar el id usuarop

        $userRecetas = Auth::user()->userRecetas;
        return view("recetas.index")->with('userRecetas',$userRecetas);
        //Maneras de enviar parametros a las vista
        //return view("recetas.index")->with('recetas',$recetas) ->with('categoria',$categoria);
        //return view("recetas.index", compact('recetas','categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //sin modelo
       //$categorias=DB::table('categorias')->get()->pluck('nombre','id');
       //con modelo
       $categorias = Categoria::all(['id','nombre']);
        return view("recetas.create")->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rutaimagen = ($request['imagen']->store('upload-recetas','public'));
        $data=request()->validate([
            'nombre' => 'required|min:6',
            'categoria' => 'required',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'imagen' => 'required|image'
        ]);
        //dd($request -> all());
        //redimensionar y guardar
        $img=Image::make(public_path("storage/{$rutaimagen}"))->fit(1000,550);
        $img->save();

        //almacenar en la bdd sin modelo
        /*DB::table('recetas')->insert([
            'nombre'=> $data['nombre'],
            'ingredientes'=> $data['ingredientes'],
            'preparacion'=> $data['preparacion'],
            'imagen' => $rutaimagen,
            'user_id' => Auth::user()->id,
             'categoria_id' =>  $data['categoria']

        ]);*/

        //almacenar en la bdd scon modelo
        Auth::user()->userRecetas()->create([
            'nombre'=> $data['nombre'],
            'ingredientes'=> $data['ingredientes'],
            'preparacion'=> $data['preparacion'],
            'imagen' => $rutaimagen,
            'categoria_id' =>  $data['categoria']
        ]);


        //Rediccionar
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show')->with('receta',$receta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $categorias = Categoria::all(['id','nombre']);
        return view('recetas.edit')->with('categorias',$categorias)->with('receta',$receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        $this->authorize('update',$receta);
        //validar campos
        $data=request()->validate([
            'nombre' => 'required|min:6',
            'categoria' => 'required',
            'ingredientes' => 'required',
            'preparacion' => 'required'
        ]);

        //asignar valores
        $receta -> nombre = $data['nombre'];
        $receta -> categoria_id = $data['categoria'];
        $receta -> ingredientes = $data['ingredientes'];
        $receta -> preparacion = $data['preparacion'];


        //Nueva imagen
        if(request('imagen')){
            $rutaimagen = ($request['imagen']->store('upload-recetas','public'));
            $img=Image::make(public_path("storage/{$rutaimagen}"))->fit(1000,550);
            $img->save();
            $receta->imagen=$rutaimagen;
        }
        $receta -> save();
        return redirect()->action([RecetaController::class,"index"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //$this->authorize('delete',$receta);
        $receta->delete();

        return  redirect()->action([RecetaController::class,"index"]);
    }
}
