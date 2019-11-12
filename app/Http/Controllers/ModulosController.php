<?php

namespace App\Http\Controllers;

use App\Modulos;
use App\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $modulos = Modulos::join("auditoria", "auditoria.cod_reg", "=", "modulos.id_modulo")
                                ->where("auditoria.tabla", "modulos")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("modulos.id_modulo", "DESC")
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
                'nombre'       => 'required|unique:modulos',
                'descripcion'  => 'required',
                'posicion'     => 'required'

            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                $posicionar = array(
                    'posicion' => $request["posicion"],
                    'tipo'     => 'insert',
                );

                $this->posicionar_modulos($posicionar);

                $modulo = Modulos::create($request->all());


                $auditoria              = new Auditoria;
                $auditoria->tabla       = "modulos";
                $auditoria->cod_reg     = $modulo->id_modulo;
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();


                if ($modulo) {
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


    public function posicionar_modulos($posicion)
    {
        if($posicion['tipo'] == 'insert'){
            $modulos = Modulos::where("posicion", ">=" ,"".$posicion["posicion"]."")
                               ->get();

            if (sizeof($modulos) > 0) {
                foreach ($modulos as $row)
                {
                    $datos=array(
                        'posicion' => $row->posicion + 1,
                    );

                    $modulo_edit = Modulos::where("id_modulo",$row->id_modulo)
                               ->first();
                 
                    $modulo_edit->posicion = $row->posicion + 1;
                    $modulo_edit->save();

                }
            }
        }else{
            if($posicion['final'] > $posicion['inicial']){

                $modulos = Modulos::where("posicion", ">" ,"".$posicion["inicial"]."")
                                  ->where("posicion", "<=" ,"".$posicion["final"]."")
                                  ->get();


                if (sizeof($modulos) > 0) {
                    foreach ($modulos as $row)
                    {
                        $datos=array(
                            'posicion' => $row->posicion - 1,
                        );

                        $modulo_edit = Modulos::where("id_modulo",$row->id_modulo)
                                    ->first();
                        
                        $modulo_edit->posicion = $row->posicion + 1;
                        $modulo_edit->save();

                    }
                }

            }else if($posicion['final'] < $posicion['inicial']){

                $modulos = Modulos::where("posicion", ">=" ,"".$posicion["inicial"]."")
                                  ->where("posicion", "<" ,"".$posicion["final"]."")
                                  ->get();


                if (sizeof($modulos) > 0) {
                    foreach ($modulos as $row)
                    {
                        $datos=array(
                            'posicion' => $row->posicion + 1,
                        );

                        $modulo_edit = Modulos::where("id_modulo",$row->id_modulo)
                                               ->first();
                        
                        $modulo_edit->posicion = $row->posicion + 1;
                        $modulo_edit->save();

                    }
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function show(Modulos $modulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulos $modulos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $modulos)
    {

        if ($this->VerifyLogin($request["id_user"],$request["token"])){


            $posicionar = array(
                'inicial'  => $request["posicion"],
                'tipo'     => 'update',
                'final'    => $request["inicial"], 
            );


            $this->posicionar_modulos($posicionar);

            
            $modulos = Modulos::find($modulos);

            $modulos->nombre      =  $request["nombre"];
            $modulos->descripcion =  $request["descripcion"];
            $modulos->icon        =  $request["icon"];
            $modulos->posicion    =  $request["posicion"];
            $modulos->save();

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
                                     ->where("tabla", "modulos")->first();

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
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulos $modulos)
    {
        //
    }
}
