<?php

namespace App\Http\Controllers;

use App\Queries;
use App\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $queries = Queries::select("queries.*", "auditoria.*", "users.email as email_regis", "clientes.*", "queries.status as status_queries")
                                ->join("auditoria", "auditoria.cod_reg", "=", "queries.id_queries")
                                ->join("clientes", "clientes.id_cliente", "=", "queries.id_cliente")
                                ->join("users", "users.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.tabla", "queries")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("queries.id_queries", "DESC")
                                ->get();
            echo json_encode($queries);
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
                'id_cliente'    => 'required',
                'fecha'         => 'required',
                'observaciones' => 'required'
            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{


                $queries = Queries::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "queries";
                $auditoria->cod_reg     = $queries["id_queries"];
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();

                if ($queries) {
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
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function show(Queries $queries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function edit($id_queries)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_queries)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            

            if($file = $request->file('file')){
                $destinationPath = 'img/queries/cotizaciones';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["file_cotizacion"] = $file->getClientOriginalName();
            }
            

            $queries = Queries::find($id_queries)->update($request->all());

            if ($queries) {
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
                                     ->where("tabla", "queries")->first();
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
     * @param  \App\Queries  $queries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queries $queries)
    {
        //
    }
}
