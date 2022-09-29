<?php

namespace App\Http\Requests;

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
        // TODO if client is owner of the account
        return true;
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
