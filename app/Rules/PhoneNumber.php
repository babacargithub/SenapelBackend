<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PhoneNumber implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        //
        if(!preg_match("/^7[7680][0-9]{7}$/", $value)){
            $fail("Numéro téléphone invalid");
        }

    }
}
