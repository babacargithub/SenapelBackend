<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParutionRequest;
use App\Http\Requests\UpdateParutionRequest;
use App\Http\Resources\AppelResource;
use App\Http\Resources\AvisResource;
use App\Http\Resources\ParutionResource;
use App\Http\Resources\ParutionWithRelationsResource;
use App\Models\Appel;
use App\Models\Avis;
use App\Models\Parution;
use App\Policies\ProtectPaidContent;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
        $column = 'journee';
        $parution = Parution::where($column, $date)->first();
        if ($parution == null) {
            return null;
        }

        return response(new ParutionResource($parution));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionParDateAppels($date): ?Response
    {
        //
        $column = 'journee';
        $parution = Parution::where($column, $date)->first();
        if ($parution == null) {
            return null;
        }

        return response(new ParutionWithRelationsResource($parution));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionParDateAvis($date): ?Response
    {
        //
        $column = 'journee';
        $parution = Parution::where($column, $date)->first();
        if ($parution == null) {
            return null;
        }

        return response(new ParutionWithRelationsResource($parution));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionParMois($mois, $annee)
    {
        //
        $column = 'journee';
        $parutions = Parution::whereMonth($column, $mois)->whereYear($column, $annee)->get();

        return response(ParutionWithRelationsResource::collection($parutions));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function archiveMois($mois, $annee)
    {
        //
        $column = 'date_appel';
        $appels = Appel::with(['parution'])->whereMonth($column, $mois)->whereYear($column, $annee)->get();
$avis = Avis::with(['parution'])->whereMonth('created_at', $mois)->whereYear("created_at", $annee)->get();
        return response()->json(["appels"=>AppelResource::collection($appels), "avis"=>AvisResource::collection($avis)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionDans($date, $paru_dans)
    {
        //
        $column = 'journee';
        /** @var Parution $parution */
        $parution = Parution::where($column, $date)
            ->first();
        /* ->whereHas('appels', function (Builder $query) use ($paru_dans){
        $query
            ->where('publie_dans', 'like', "$paru_dans%");
    })->orWhereHas('appels', function (Builder $query) use ($paru_dans){
        $query
            ->where('publie_dans', 'like', "$paru_dans%");
    }) */
        if ($parution == null) {
            return null;
        }
        $parution->appels()->where('publie_dans','like',"$paru_dans%");
        $parution->avis()->where('publie_dans','like',"$paru_dans%");

        return response(new ParutionWithRelationsResource($parution));
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     *
     * @throws AuthorizationException
     */
    public function appelsParution(Parution $parution, ProtectPaidContent $checker)
    {
        //

        if (! $checker->isAllowedToViewPaidContent($parution)) {
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
        if (! $checker->isAllowedToViewPaidContent($parution)) {
            return $checker->accessDeniedResponse();
        }

        return response(AvisResource::collection($parution->avis));
    }

    public function laUneDesJournaux($date)
    {

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
        return response(new ParutionWithRelationsResource($parution));
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
