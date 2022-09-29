<?php

namespace App\Http\Controllers;

use App\Http\Requests\AugmenterSoldeCompteClientRequest;
use App\Http\Requests\StoreCompteClientRequest;
use App\Http\Requests\UpdateCompteClientRequest;
use App\Models\CompteClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class CompteClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCompteClientRequest  $request
     * @return Response
     */
    public function store(StoreCompteClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param CompteClient $compteClient
     * @return Response
     */
    public function show(CompteClient $compteClient)
    {
        //
        return \response(new JsonResource($compteClient));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CompteClient $compteClient
     * @return Response
     */
    public function edit(CompteClient $compteClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompteClientRequest  $request
     * @param CompteClient $compteClient
     * @return Response
     */
    public function update(UpdateCompteClientRequest $request, CompteClient $compteClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CompteClient $compteClient
     * @return Response
     */
    public function destroy(CompteClient $compteClient)
    {
        //
    }
    /**
     * augmenter le solde d'un client
     *
     * @param CompteClient $compteClient
     * @return Response
     */
    public function augmenterSolde(CompteClient $compteClient, AugmenterSoldeCompteClientRequest $augmenterSoldeCompteClientRequest)
    {
        //
        $compteClient->augmenterSolde($augmenterSoldeCompteClientRequest->validated()['montant']);
        $compteClient->save();
        return  \response(new JsonResource($compteClient));
    }
}
