<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAvisRequest;
use App\Http\Requests\UpdateAvisRequest;
use App\Http\Resources\AvisResource;
use App\Models\Avis;
use App\Policies\ProtectPaidContent;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return response(AvisResource::collection(Avis::all()));
    }
    /**
     * Display the specified resource.
     *
     * @param Avis $avi
     */
    public function show(Avis $avi, ProtectPaidContent $checker)
    {
        //
        if ($checker->isAllowedToViewPaidContent($avi->parution)){
            return $checker->accessDeniedResponse();

        }
        return $avi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function avisExpires()
    {
        //
        $dateActuelle = Date('Y-m-d H:i:s');
        $avis = Avis::where('created_at','<',$dateActuelle)->get();
        return response(AvisResource::collection($avis));
    }
}
