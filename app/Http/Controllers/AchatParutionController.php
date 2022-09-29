<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchatParutionRequest;
use App\Http\Requests\UpdateAchatParutionRequest;
use App\Models\AchatParution;
use App\Models\Client;
use App\Models\Parution;

class AchatParutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAchatParutionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAchatParutionRequest $achatParutionRequest)
    {
        //
        //TODO uncomment line when payment method Wave is implemented
//        $paymentData = ['parution_id'=>1, "client_id"=>1, 'prix'=>3500];
        $paymentData = $achatParutionRequest->all();
        $parution =  Parution::find($paymentData['parution_id']);
        $client =  Client::find($paymentData['client_id']);
        return AchatParution::create(["paye_par"=>"WAVE","prix"=>$paymentData['prix'],'client_id'=>$client->id,'parution_id'=>$parution->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AchatParution  $achatParution
     * @return \Illuminate\Http\Response
     */
    public function show(AchatParution $achatParution)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAchatParutionRequest  $request
     * @param  \App\Models\AchatParution  $achatParution
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAchatParutionRequest $request, AchatParution $achatParution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AchatParution  $achatParution
     * @return \Illuminate\Http\Response
     */
    public function destroy(AchatParution $achatParution)
    {
        //
    }
}
