<?php

namespace App\Http\Requests\Admin\Destinations;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreDestinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'string|max:255|unique:destinations,title',
            'description' => 'required|string',
            'content'=> 'required|string',
            'image' => 'required|image',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'weather' => 'nullable|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:destinations,slug',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', // Expresión regular mejorada para validar el slug
            ],
            'accesibility' => 'required|string|max:255',
        ];
    }
}
