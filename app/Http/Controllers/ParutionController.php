<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParutionRequest;
use App\Http\Requests\UpdateParutionRequest;
use App\Http\Resources\AppelResource;
use App\Http\Resources\AvisResource;
use App\Http\Resources\ParutionResource;
use App\Models\AchatParution;
use App\Models\Client;
use App\Models\Parution;
use App\Policies\ProtectPaidContent;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;

class ParutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return response(ParutionResource::collection(Parution::all()));
    }
/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionParDate($date)
    {
        //
        $column ="journee";
        $parution = Parution::where($column,$date)->first();
        if ($parution == null){
            return null;
        }
        return response(new ParutionResource($parution));
    }
/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionParMois($mois,$annee)
    {
        //
        $column ="journee";
        $parutions = Parution::whereMonth($column,$mois)->whereYear($column,$annee)->get();

        return response(ParutionResource::collection($parutions));
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     * @throws AuthorizationException
     */
    public function appelsParution(Parution $parution, ProtectPaidContent $checker)
    {
        //

        if (! $checker->isAllowedToViewPaidContent($parution)){
            return $checker->accessDeniedResponse();

        }
        return response(AppelResource::collection($parution->appels));
    }
/**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
 */
    public function avisParution(Parution $parution, ProtectPaidContent $checker)
    {
        //
        if ( ! $checker->isAllowedToViewPaidContent($parution)){
            return $checker->accessDeniedResponse();

        }
        return response(AvisResource::collection($parution->avis));
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
     * @param  \App\Http\Requests\StoreParutionRequest  $request
     * @return Response
     */
    public function store(StoreParutionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parution  $parution
     * @return Response
     */
    public function show(Parution $parution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parution  $parution
     * @return Response
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
     * @return Response
     */
    public function update(UpdateParutionRequest $request, Parution $parution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parution  $parution
     * @return Response
     */
    public function destroy(Parution $parution)
    {
        //
    }
}
