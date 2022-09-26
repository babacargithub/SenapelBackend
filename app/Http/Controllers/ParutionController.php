<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParutionRequest;
use App\Http\Requests\UpdateParutionRequest;
use App\Models\Parution;

class ParutionController extends Controller
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
     * @param  \App\Http\Requests\StoreParutionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParutionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parution  $parution
     * @return \Illuminate\Http\Response
     */
    public function show(Parution $parution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parution  $parution
     * @return \Illuminate\Http\Response
     */
    public function edit(Parution $parution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParutionRequest  $request
     * @param  \App\Models\Parution  $parution
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParutionRequest $request, Parution $parution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parution  $parution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parution $parution)
    {
        //
    }
}
