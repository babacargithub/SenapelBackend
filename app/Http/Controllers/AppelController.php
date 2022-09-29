<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppelRequest;
use App\Http\Requests\UpdateAppelRequest;
use App\Http\Resources\AppelResource;
use App\Models\Appel;
use App\Policies\ProtectPaidContent;

class AppelController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function appelsExpires()
    {
        //
        $dateActuelle = Date('Y-m-d H:i:s');
        $appels = Appel::where('date_limite','>',$dateActuelle)->get();
        return response(AppelResource::collection($appels));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response('appels.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appel  $appel
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Appel $appel, ProtectPaidContent $checker)
    {
        //
        if ($checker->isAllowedToViewPaidContent($appel->parution)){
            return $checker->accessDeniedResponse();

        }
        return response(new AppelResource($appel));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appel  $appel
     * @return \Illuminate\Http\Response
     */
    public function edit(Appel $appel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppelRequest  $request
     * @param  \App\Models\Appel  $appel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppelRequest $request, Appel $appel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appel  $appel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appel $appel)
    {
        //
    }
}
