<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    protected $fillable = [
        'name', 'precio', 'description', 'category', 'country', 'logo'
    ];

    protected $table         = 'hosting';
    public    $timestamps    = false;
    protected $primaryKey    = 'id_hosting';


    public function benefits()
    {
      return $this->hasMany('App\BenefitsHosting', 'id_hosting');
    }


    public function Support()
    {
      return $this->hasMany('App\CustomerSupportHosting', 'id_hosting');
    }


    public function WayToPay()
    {
      return $this->hasMany('App\WaytoPayHosting', 'id_hosting');
    }





}
