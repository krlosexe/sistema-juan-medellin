<?php

namespace App\Http\Controllers;

use App\User;
use App\Auditoria;
use App\datosPersonaesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])) {
            $User = User::select("users.*", "datos_personales.*", "roles.nombre_rol", "auditoria.status", "auditoria.fec_regins", "user_registro.email as user_registro")
                          ->join('datos_personales', 'datos_personales.id_usuario', '=', 'users.id')
                          ->join("auditoria", "auditoria.cod_reg", "=", "users.id")
                          ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                          ->join("roles", "roles.id_rol", "=", "users.id_rol")
                          ->where("auditoria.tabla", "users")
                          ->where("auditoria.status", "!=", "0")
                          ->orderBy("users.id", "desc")
                          ->get();
            
            return response()->json($User)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



    public function GetAsesoras(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])) {
            $User = User::select("users.*", "datos_personales.*", "roles.nombre_rol", "auditoria.status", "auditoria.fec_regins", "user_registro.email as user_registro")
                          ->join('datos_personales', 'datos_personales.id_usuario', '=', 'users.id')
                          ->join("auditoria", "auditoria.cod_reg", "=", "users.id")
                          ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                          ->join("roles", "roles.id_rol", "=", "users.id_rol")
                          ->where("roles.nombre_rol", "Asesor")
                          ->where("auditoria.tabla", "users")
                          ->where("auditoria.status", "!=", "0")
                          ->orderBy("users.id", "desc")
                          ->get();
            
            return response()->json($User)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $messages = [
                'required' => 'El Campo :attribute es requirdo.',
                'unique'   => 'El Campo :attribute ya se encuentra en uso.'
            ];


            $validator = Validator::make($request->all(), [
                'img-profile'     => 'required',
                'email'           => 'required|unique:users',
                'password'        => 'required',
                'repeat-password' => 'required',
                'rol'             => 'required'

            ], $messages);  


            if ($request["password"] != $request["repeat-password"]) {
                return response()->json("Las contrasenas no coinciden")->setStatusCode(400);
            }

            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);

            }else{

                $file = $request->file('img-profile');

                $destinationPath = 'img/usuarios/profile';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["img_profile"] = " asdasdasd asdas"; //add request

               
                $User              = new User;
                $User->email       = $request["email"];
                $User->password    = md5($request["password"]);
                $User->img_profile = $file->getClientOriginalName();
                $User->id_rol      = $request["rol"];
                
                $User->save();


                $datos_personales                   = new datosPersonaesModel;
                $datos_personales->nombres          = $request["nombres"];
                $datos_personales->apellido_p       = $request["apellido_p"];
                $datos_personales->apellido_m       = $request["apellido_m"];
                $datos_personales->n_cedula         = $request["n_cedula"];
                $datos_personales->fecha_nacimiento = $request["fecha_nacimiento"];
                $datos_personales->telefono         = $request["telefono"];
                $datos_personales->direccion        = $request["direccion"];
                $datos_personales->id_usuario       = $User->id;
                $datos_personales->save();


                $auditoria              = new Auditoria;
                $auditoria->tabla       = "users";
                $auditoria->cod_reg     = $User->id;
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();

                if ($User) {
                    $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                    return response()->json($data)->setStatusCode(200);
                }else{
                    return response()->json("A ocurrido un error")->setStatusCode(400);
                }
            }
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "STRING";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            
            $messages = [
                'required' => 'El Campo :attribute es requirdo.',
                'unique'   => 'El Campo :attribute ya se encuentra en uso.'
            ];


            $validator = Validator::make($request->all(), [
                //'email'           => 'required|unique:users',
                'rol'             => 'required'

            ], $messages); 
            

            if($request["password"] != "" || $request["repeat-password"] != ""){

                if ($request["password"] != $request["repeat-password"]) {
                    return response()->json("Las contrasenas no coinciden")->setStatusCode(400);
                }

            }
            

            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

               $file = $request->file('img-profile');
              
               
               
                $User = User::find($id);

                $User->email  = $request["email"];
                $User->id_rol = $request["rol"];

                if($file != null){
                    $destinationPath = 'img/usuarios/profile';
                    $file->move($destinationPath,$file->getClientOriginalName());
                    $User->img_profile = $file->getClientOriginalName();
                }


                if($request["password"] != "" && $request["repeat-password"] != ""){
                    $User->password = md5($request["password"]);
                }



                $User->save();

                $datos_personales = datosPersonaesModel::where("id_usuario", $id)->first();


                $datos_personales->nombres          = $request["nombres"];
                $datos_personales->apellido_p       = $request["apellido_p"];
                $datos_personales->apellido_m       = $request["apellido_m"];
                $datos_personales->n_cedula         = $request["n_cedula"];
                $datos_personales->fecha_nacimiento = $request["fecha_nacimiento"];
                $datos_personales->telefono         = $request["telefono"];
                $datos_personales->direccion        = $request["direccion"];

                $datos_personales->save();

                $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);

            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
        
    }


    public function statusUser($id_user, $status, Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $auditoria =  Auditoria::where("cod_reg", $id_user)
                                     ->where("tabla", "users")->first();

            $auditoria->status = $status;

            if($status == 0){
                $auditoria->usr_regmod = $request["id_user"];
                $auditoria->fec_regmod = date("Y-m-d");
            }

            $auditoria->save();

            $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
