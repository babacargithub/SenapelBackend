<?php

namespace App\Http\Controllers;

use App\Models\Parution;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    //
    public function getCheckoutUrl(Parution $parution)
    {
        return 'paiement-urs/'.$parution->id;
    }
}
