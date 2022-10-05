<?php

namespace App\Policies;

use App\Models\AchatParution;
use App\Models\Client;
use App\Models\Parution;
use Illuminate\Http\Request;

class ProtectPaidContent
{


    public function isAllowedToViewPaidContent(Parution $parution): bool
    {
        //TODO re-enable later
      /*  $clientId = request()->header('Client-Id');
        if ($clientId == null){
            throw new \InvalidArgumentException('client id cannot be null');
        }
        $client = Client::findOrFail($clientId);
        $achat = AchatParution::where(['client_id'=>$client->id,'parution_id'=>$parution->id])->first();

        return $achat == null;*/
        return true;
    }

    public function accessDeniedResponse()
    {
       return response()->json(
            [
                'error' => 'Accès refusé',
                'message' => 'Vous n\'avez pas acheté cette parution.',
            ],403);
    }

    public function requireClient(): Client
    {
        $clientId = request()->header('Client-Id');
        if ($clientId == null){
            throw new \InvalidArgumentException('client id cannot be null');
        }
        return  Client::findOrFail($clientId);

    }

}
