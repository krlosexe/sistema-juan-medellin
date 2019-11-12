<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{   

    protected $fillable = [
        'nombres', 'apellidos', 'identificacion', 'telefono', 'email', 'direccion', 'fecha_nacimiento', 'identificacion_verify', 'city', 'clinic', 'id_line', 'id_user_asesora'
    ];


    protected $table         = 'clientes';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_cliente';
}
