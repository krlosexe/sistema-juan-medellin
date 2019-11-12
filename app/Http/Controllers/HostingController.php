<?php

namespace App\Http\Controllers;

use App\Hosting;
use App\Auditoria;
use App\BenefitsHosting;
use App\WayToPayHosting;
use Illuminate\Http\Request;
use App\CustomerSupportHosting;
use Illuminate\Support\Facades\Validator;

class HostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){
            $result = Hosting::select("hosting.*", "auditoria.*", "user_registro.email as email_regis")
                                ->join("auditoria", "auditoria.cod_reg", "=", "hosting.id_hosting")
                                ->where("auditoria.tabla", "hosting")
                                ->join("users as user_registro", "user_registro.id", "=", "auditoria.usr_regins")

                                ->with("benefits")
                                
                                ->with("Support")
                                ->with("WayToPay")

                                ->where("auditoria.status", "!=", "0")
                                ->orderBy("hosting.id_hosting", "DESC")
                                ->get();
           
            return response()->json($result)->setStatusCode(200);
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
                'name'        => 'required|unique:hosting',
                'precio'      => 'required',
                'description' => 'required',
                'category'    => 'required',
                'country'     => 'required',
            ], $messages);  


            if ($validator->fails()) {
                return response()->json($validator->errors())->setStatusCode(400);
            }else{

                
                $file = $request->file('logo_file');

                $destinationPath = 'img/hosting/';
                $file->move($destinationPath,$file->getClientOriginalName());
                $request["logo"] = $file->getClientOriginalName();

                $store = Hosting::create($request->all());

                foreach($request["benefits"] as $key => $benefit){
                    $benefits               = New BenefitsHosting;
                    $benefits->id_benefits  = $benefit;
                    $benefits->id_hosting   = $store["id_hosting"];
                    $benefits->save();

                }

                foreach($request["customer-support"] as $key => $value){
                    $customerSupport                      = New CustomerSupportHosting;
                    $customerSupport->id_customer_support = $value;
                    $customerSupport->id_hosting          = $store["id_hosting"];
                    $customerSupport->save();
                }

                foreach($request["way-to-pay"] as $key => $value){
                    $wayToPayHosting                = New WayToPayHosting;
                    $wayToPayHosting->id_way_to_pay = $value;
                    $wayToPayHosting->id_hosting    = $store["id_hosting"];
                    $wayToPayHosting->save();
                }

                $auditoria              = new Auditoria;
                $auditoria->tabla       = "hosting";
                $auditoria->cod_reg     = $store["id_hosting"];
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
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function show(Hosting $hosting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function edit(Hosting $hosting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Hosting)
    {
        if ($this->VerifyLogin($request["id_user"],$request["token"])){

            $store = Hosting::find($Hosting)->update($request->all());

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hosting  $hosting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hosting $hosting)
    {
        //
    }
}
