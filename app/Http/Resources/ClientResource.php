<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
public function toArray($request)
{
    $data = parent::toArray($request);
    $data['compte_client'] = $this->compteClient;

    return $data;
}
}
