<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table   = 'auditoria';
    public $timestamps = false;


    protected $primaryKey = 'id_auditoria';

}
