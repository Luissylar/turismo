<?php

namespace App\Rules\Admin\Destination;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoImages implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Verifica si el contenido contiene etiquetas <img>
        if (preg_match('/<img\s+[^>]*src=["\']data:image/', $value)) {
            $fail('El campo :attribute no debe contener imágenes.');
        }
    }
}
