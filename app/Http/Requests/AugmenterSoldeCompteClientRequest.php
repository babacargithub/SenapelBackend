<?php

namespace App\Http\Requests;

use App\Policies\ProtectPaidContent;
use Illuminate\Foundation\Http\FormRequest;

class AugmenterSoldeCompteClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $checker = new ProtectPaidContent();
        $client = $checker->requireClient();

        return  $this->compteClient->client->id == $client->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'montant'=>'integer|required|min_digits:2|max_digits:5'
            //
        ];
    }
}
