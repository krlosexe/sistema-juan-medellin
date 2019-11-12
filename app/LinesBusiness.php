<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinesBusiness extends Model
{
    protected $fillable = [
        'nombre_line'
    ];

    protected $table         = 'lines_business';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_line';
}
