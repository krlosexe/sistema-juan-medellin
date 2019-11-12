<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'icon', 'posicion',
    ];

     public $timestamps = false;

     protected $primaryKey = 'id_modulo';
}
