<?php

namespace App\Http\Controllers;

use App\AuthUsers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function VerifyLogin($id_user, $token)
    {

    	$AuthUsers = AuthUsers::where("token", $token)
                                ->where("id_user", $id_user)
                                ->get();
        
        if (sizeof($AuthUsers) > 0) {
    		return true;
        }else{
    		return false;
        }   


    	return $arrayName = array(1,2,3);
    }
}
