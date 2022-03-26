<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ingredientes',
        'preparacion',
        'imagen',
        'categoria_id',
    ];

    public function categoriaReceta(){
        return $this->belongsTo(Categoria:: class, 'categoria_id');
    }

    public function autorReceta(){
        return $this->belongsTo(User::class,'user_id');
    }
}
