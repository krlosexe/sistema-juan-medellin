<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table         = 'countries';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_countries';
}
