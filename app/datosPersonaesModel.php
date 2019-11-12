<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datosPersonaesModel extends Model
{
    protected $table   = 'datos_personales';
    public $timestamps = false;
    
    protected $primaryKey = 'id_datos_personales';
}
