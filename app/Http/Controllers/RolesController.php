<?php

namespace App\Http\Controllers;

use App\Roles;
use App\Auditoria;
use App\RolOperaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            
            $modulos = Roles::select("roles.*", "auditoria.*","users.email")
                                ->join("auditoria", "auditoria.cod_reg", "=", "roles.id_rol")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "roles")
                                ->where("auditoria.status", "!=", 0)
                                ->orderBy("roles.id_rol", "DESC")
                                ->with(array('rol_operaciones'=>function($query){
                                    $query->select("rol_operaciones.*","funciones.nombre as name_funcion", "modulos.nombre as name_modulo", "modulos.id_modulo");
                                    $query->join("funciones", "funciones.id_funciones", "=", "rol_operaciones.id_funciones");
                                    $query->join("modulos", "modulos.id_modulo", "=", "funciones.id_modulo");
                                    $query->orderBy("modulos.id_modulo", "DESC");
                                }))
                                ->get();
                                
            return response()->json($modulos)->setStatusCode(200);
            
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
                'nombre_rol'       => 'required|unique:roles',
                'descripcion_rol'  => 'required',
            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{
                $rol = Roles::create($request->all());


                if($request->permisos){
                    foreach ($request->permisos as $key => $value) {
                        $rol_operaciones = new RolOperaciones;
                        $rol_operaciones->id_rol       = $rol->id_rol;
                        $rol_operaciones->id_funciones = $value[0];
                        $rol_operaciones->registrar    = $value[1];
                        $rol_operaciones->general      = $value[2];
                        $rol_operaciones->detallada    = $value[3];
                        $rol_operaciones->actualizar   = $value[4];
                        $rol_operaciones->eliminar     = $value[5];
    
                        $rol_operaciones->save();
                    }    
                }
                




                $auditoria              = new Auditoria;
                $auditoria->tabla       = "roles";
                $auditoria->cod_reg     = $rol->id_rol;
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();




                if ($rol) {
                    $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                    return response()->json($data)->setStatusCode(200);
                }
            }



        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rol)
    {

        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $rol = Roles::find($id_rol);

            $rol->nombre_rol      = $request["nombre_rol"];
            $rol->descripcion_rol = $request["descripcion_rol"];
            $rol->save();


            RolOperaciones::where('id_rol', $id_rol)->delete();


            foreach ($request->permisos as $key => $value) {
                $rol_operaciones = new RolOperaciones;
                $rol_operaciones->id_rol       = $id_rol;
                $rol_operaciones->id_funciones = $value[0];
                $rol_operaciones->registrar    = $value[1];
                $rol_operaciones->general      = $value[2];
                $rol_operaciones->detallada    = $value[3];
                $rol_operaciones->actualizar   = $value[4];
                $rol_operaciones->eliminar     = $value[5];

                $rol_operaciones->save();
              
            }


            $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);


        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }

       
    }



    public function status($id_modulo, $status, Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $auditoria =  Auditoria::where("cod_reg", $id_modulo)
                                     ->where("tabla", "roles")->first();

            $auditoria->status = $status;

            if($status == 0){
                $auditoria->usr_regmod = $request["id_modulo"];
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
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
