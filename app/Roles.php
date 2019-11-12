<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

	protected $fillable = [
        'nombre_rol', 'descripcion_rol'
    ];


    public $timestamps = false;

    protected $primaryKey = 'id_rol';



  public function rol_operaciones()
  {
      return $this->hasMany('App\RolOperaciones', 'id_rol', 'id_rol');
  }

}


