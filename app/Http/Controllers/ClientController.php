<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\CompteClient;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return \response(ClientResource::collection(Client::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientRequest $request
     * @return Response
     */
    public function store(StoreClientRequest $request)
    {
        //
        $data = $request->validated();
        $client = Client::create( $data);
        CompteClient::create(['solde'=>0, 'client_id'=>$client->id]);

        return response($client);
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function show(Client $client)
    {
        //
        return \response(new ClientResource($client));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClientRequest $request
     * @param Client $client
     * @return Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
        return $client->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
