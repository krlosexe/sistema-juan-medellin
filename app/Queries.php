<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queries extends Model
{
    protected $fillable = [
        'id_cliente', 'fecha', 'observaciones', 'status', 'file_cotizacion'
    ];

    protected $table         = 'queries';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_queries';
}
