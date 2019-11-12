<?php

namespace App\Http\Controllers;

use App\Funciones;
use App\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FuncionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $modulos = Funciones::select("funciones.*", "auditoria.*", "modulos.nombre as nombre_modulo", "users.email")
                                ->join("auditoria", "auditoria.cod_reg", "=", "funciones.id_funciones")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->join("modulos", "modulos.id_modulo", "=", "funciones.id_modulo")
                                ->where("auditoria.tabla", "funciones")
                                ->where("auditoria.status", "!=", 0)
                                ->orderBy("id_funciones", "DESC")
                                ->get();
            echo json_encode($modulos);
        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }


    public function listFunciones(Request $request)
    {
       if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $modulos = Funciones::join("auditoria", "auditoria.cod_reg", "=", "funciones.id_funciones")
                                ->where("auditoria.tabla", "funciones")
                                ->where("funciones.id_modulo", $request["id"])
                                ->get();
            echo json_encode($modulos);
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

                'nombre'       => 'required|unique:funciones',
                'descripcion'  => 'required',
                'route'        => 'required',
                'id_modulo'    => 'required',
                'posicion'     => 'required',
                'visible'      => 'required'

            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                $posicionar = array(
                    'modulo'   => $request["id_modulo"],
                    'posicion' => $request["posicion"]
                );

                $this->posicionar_funciones($posicionar);

                $funciones = Funciones::create($request->all());


                $auditoria              = new Auditoria;
                $auditoria->tabla       = "funciones";
                $auditoria->cod_reg     = $funciones->id_funciones;
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();


                if ($funciones) {
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





    public function posicionar_funciones($posicionar)
    {

        $modulos = Funciones::where("posicion", ">=" ,"".$posicionar["posicion"]."")
                              ->where("id_modulo" ,$posicionar["modulo"])
                               ->get();


        if (sizeof($modulos) > 0) {
            foreach ($modulos as $row)
            {
                $datos=array(
                    'posicion' => $row->posicion + 1,
                );

                $modulo_edit = Funciones::where("id_funciones",$row->id_funciones)
                               ->first();

                $modulo_edit->posicion = $row->posicion + 1;
                $modulo_edit->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funciones  $funciones
     * @return \Illuminate\Http\Response
     */
    public function show(Funciones $funciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funciones  $funciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Funciones $funciones)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funciones  $funciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_funciones)
    {  
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

           // $this->posicionar_funciones($posicionar);
           
            $funciones = Funciones::find($id_funciones);

            $funciones->id_modulo    =  $request["id_modulo"];
            $funciones->nombre       =  $request["nombre"];
            $funciones->descripcion  =  $request["descripcion"];
            $funciones->posicion     =  $request["posicion"];
            $funciones->route        =  $request["route"];
            $funciones->visibilidad  =  $request["visible"];
            $funciones->save();

            $data = array('mensagge' => "Los datos fueron actualizados satisfactoriamente");    
            return response()->json($data)->setStatusCode(200);

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }



    public function status($id_modulo, $status, Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $auditoria =  Auditoria::where("cod_reg", $id_modulo)
                                     ->where("tabla", "funciones")->first();

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
     * @param  \App\Funciones  $funciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funciones $funciones)
    {
        //
    }
}
