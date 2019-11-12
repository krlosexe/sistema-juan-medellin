<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolOperaciones extends Model
{
    protected $table   = 'rol_operaciones';
    public $timestamps = false;


    public function funciones()
    {
      return $this->hasMany('App\Funciones', 'id_funciones', 'id_funciones');
    }
}
