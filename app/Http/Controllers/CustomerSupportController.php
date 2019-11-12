<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\CustomerSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $modulos = CustomerSupport::select("customer_support.*", "auditoria.*", "user_registro.email as email_regis")
                                ->join("auditoria", "auditoria.cod_reg", "=", "customer_support.id_customer_support")
                                ->where("auditoria.tabla", "customer_support")
                                ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")
                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("customer_support.id_customer_support", "DESC")
                                ->get();
           
            return response()->json($modulos)->setStatusCode(200);
       // }else{
        //    return response()->json("No esta autorizado")->setStatusCode(400);
        //}
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
                'nombre'          => 'required|unique:customer_support'
            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                $store = CustomerSupport::create($request->all());

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "customer_support";
                $auditoria->cod_reg     = $store["id_customer_support"];
                $auditoria->status      = 1;
                $auditoria->usr_regins  = $request["id_user"];
                $auditoria->save();

                if ($store) {
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
     * @param  \App\CustomerSupport  $customerSupport
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerSupport $customerSupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerSupport  $customerSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerSupport $customerSupport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerSupport  $customerSupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CustomerSupport)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $store = CustomerSupport::find($CustomerSupport)->update($request->all());

            if ($store) {
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
                                     ->where("tabla", "customer_support")->first();

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
     * @param  \App\CustomerSupport  $customerSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerSupport $customerSupport)
    {
        //
    }
}
