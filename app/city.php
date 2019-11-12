<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table         = 'citys';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_city';
}
