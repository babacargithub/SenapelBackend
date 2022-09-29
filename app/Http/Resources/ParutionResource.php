<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class ParutionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "date"=>$this->journee->format('d M Y'),
            "prix"=>$this->prix,
            "id"=>$this->id,
            "nombre_appels"=>$this->appels->count()
        ];
    }
}
