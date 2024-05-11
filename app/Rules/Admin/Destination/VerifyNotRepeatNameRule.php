<?php

namespace App\Rules\Admin\Destination;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyNotRepeatNameRule implements ValidationRule
{
    /**
     * Verificar que el nombre de un destino, no sea repetido
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
