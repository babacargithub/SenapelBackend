<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompteClientRequest;
use App\Http\Requests\UpdateCompteClientRequest;
use App\Models\CompteClient;

class CompteClientController extends Controller
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
     * @param  \App\Http\Requests\StoreCompteClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompteClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompteClient  $compteClient
     * @return \Illuminate\Http\Response
     */
    public function show(CompteClient $compteClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompteClient  $compteClient
     * @return \Illuminate\Http\Response
     */
    public function edit(CompteClient $compteClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompteClientRequest  $request
     * @param  \App\Models\CompteClient  $compteClient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompteClientRequest $request, CompteClient $compteClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompteClient  $compteClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompteClient $compteClient)
    {
        //
    }
}
