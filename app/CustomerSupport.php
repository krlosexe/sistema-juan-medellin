<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSupport extends Model
{
    protected $fillable = [
        'nombre'
    ];

    protected $table         = 'customer_support';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_customer_support';
}
