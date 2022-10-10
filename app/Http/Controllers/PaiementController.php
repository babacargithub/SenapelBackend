<?php

namespace App\Http\Controllers;

use App\Models\AchatParution;
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
    public function envoyerLienDePaiement(Parution $parution, ProtectPaidContent $checker)
    {
        $client = $checker->requireClient();
        $prix = $parution->prix;
        AchatParution::create(['parution_id'=>$parution->id, 'client_id'=>$client->id, 'prix'=>$prix, 'paye_par'=>'Wave']);

        return response()->json(["paiement_link_sent"=> true]);
    }
}
