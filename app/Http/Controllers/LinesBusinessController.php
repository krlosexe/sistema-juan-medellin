<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\LinesBusiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinesBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $modulos = LinesBusiness::select("lines_business.*", "auditoria.*", "user_registro.email as email_regis")
                                ->join("auditoria", "auditoria.cod_reg", "=", "lines_business.id_line")
                                ->where("auditoria.tabla", "lines_business")
                                ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("lines_business.id_line", "DESC")
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
                'nombre_line'   => 'required|unique:lines_business'
            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                $line = LinesBusiness::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "lines_business";
                $auditoria->cod_reg     = $line["id_line"];
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();

                if ($line) {
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
     * @param  \App\LinesBusiness  $linesBusiness
     * @return \Illuminate\Http\Response
     */
    public function show(LinesBusiness $linesBusiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LinesBusiness  $linesBusiness
     * @return \Illuminate\Http\Response
     */
    public function edit(LinesBusiness $linesBusiness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LinesBusiness  $linesBusiness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $linesBusiness)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $cliente = LinesBusiness::find($linesBusiness)->update($request->all());

            if ($cliente) {
                $data = array('mensagge' => "Los datos fueron registrados satisfactoriamente");    
                return response()->json($data)->setStatusCode(200);
            }else{
                return response()->json("A ocurrido un error")->setStatusCode(400);
            }

        }else{
            return response()->json("No esta autorizado")->setStatusCode(400);
        }
    }




    public function status($id, $status, Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $auditoria =  Auditoria::where("cod_reg", $id)
                                     ->where("tabla", "lines_business")->first();

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
     * @param  \App\LinesBusiness  $linesBusiness
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinesBusiness $linesBusiness)
    {
        //
    }
}
