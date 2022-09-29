<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieAppelRequest;
use App\Http\Requests\UpdateCategorieAppelRequest;
use App\Http\Resources\CategorieAppelResource;
use App\Models\CategorieAppel;

class CategorieAppelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = CategorieAppel::with(['appels' => function($query) {
            $query->whereDate('date_limite', '>',now());
        }])->get();
        return response(CategorieAppelResource::collection($categories));

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
     * @param  \App\Http\Requests\StoreCategorieAppelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorieAppelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieAppel  $categorieAppel
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieAppel $categorieAppel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieAppel  $categorieAppel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorieAppel $categorieAppel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategorieAppelRequest  $request
     * @param  \App\Models\CategorieAppel  $categorieAppel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieAppelRequest $request, CategorieAppel $categorieAppel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieAppel  $categorieAppel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieAppel $categorieAppel)
    {
        //
    }
}
