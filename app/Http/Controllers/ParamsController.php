<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamsRequest;
use App\Http\Requests\UpdateParamsRequest;
use App\Models\Params;
use Illuminate\Http\JsonResponse;
use function MongoDB\BSON\toJSON;

class ParamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|JsonResponse
     */
    public function index()
    {
        //

        return  response()->json(unserialize(Params::find(1)->content));
    }
}
