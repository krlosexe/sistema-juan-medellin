<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clinic extends Model
{
    protected $fillable = [
        'nombre', 'id_city', 'direccion'
    ];

    protected $table         = 'clinic';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_clinic';
}
