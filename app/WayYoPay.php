<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WayYoPay extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table         = 'way_to_pay';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_way_to_pay';
}
