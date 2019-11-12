<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table         = 'benefits';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_benefits';
}
