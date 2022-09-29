<?php

namespace App\Http\Controllers;

use App\Models\Parution;
use App\Policies\ProtectPaidContent;
use App\Service\PaydunyaService;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    //
    public function getCheckoutUrl(Parution $parution, ProtectPaidContent $checker, PaydunyaService $paydunyaService)
    {
        $client = $checker->requireClient();
        $prix = $parution->prix;
        $url = $paydunyaService->generateInvoiceUrl($client, $prix,$parution);
        return $url;
    }
}
