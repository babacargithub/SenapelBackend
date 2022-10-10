<?php

namespace App\Http\Resources;

use App\Models\Parution;
use App\Policies\ProtectPaidContent;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParutionWithRelationsResource extends JsonResource
{
    /**
     * @var ProtectPaidContent
     */
    protected ProtectPaidContent $protectedPaidContent;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->protectedPaidContent = new ProtectPaidContent();
        return [
            "date"=>$this->journee->format('d M Y'),
            "prix"=>$this->prix,
            "id"=>$this->id,
            "appels"=>$this->appels,
            "avis"=>$this->avis,
            "achete"=>$this->protectedPaidContent->isAllowedToViewPaidContent(Parution::find($this->id))
        ];
    }
}
