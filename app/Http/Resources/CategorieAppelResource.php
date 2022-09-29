<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategorieAppelResource extends JsonResource
{
public function toArray($request)
{
    $content = parent::toArray($request);
    $content['nombre_appels'] = $this->appels->count();

    return $content;
}
}
