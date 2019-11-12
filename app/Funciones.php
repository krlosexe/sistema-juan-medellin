<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funciones extends Model
{
   protected $fillable = [
        'nombre', 'descripcion', 'posicion', 'id_modulo', 'route', 'visibilidad'
    ];

     public $timestamps = false;

     protected $primaryKey = 'id_funciones';
}
