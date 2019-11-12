<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table         = 'category';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_category';
}
