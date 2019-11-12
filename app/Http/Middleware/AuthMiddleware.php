<?php

namespace App\Http\Middleware;

use Closure;
use App\AuthUsers;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $token   = "<script>document.write(localStorage.getItem('token'));</script>";
        $user_id = "<script>document.write(localStorage.getItem('user_id'));</script>";

        
        $AuthUsers = AuthUsers::where("token", $token)
                                ->where("id_user", $user_id)
                                ->get();

        echo json_encode($AuthUsers);

        echo "string";


        if ($token == 1) {

            echo "HOLA";
           //return redirect('/');
        }


        return $next($request);
    }
}
