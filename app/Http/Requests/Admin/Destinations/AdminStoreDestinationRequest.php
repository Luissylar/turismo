<?php

namespace App\Http\Requests\Admin\Destinations;

use Illuminate\Foundation\Http\FormRequest;


use App\Rules\Admin\Destination\NoImages;

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
            'title' => 'required|string|min:8|max:255|unique:destinations,title',
            'description' => 'required|string|min:20',
            'content' => ['required', 'string', new NoImages],
            'image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'weather' => 'nullable|string|max:255',
            'slug' => [
                'required',
                'string',
                'min:6',
                'max:255',
                'unique:destinations,slug',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            ],
            'accesibility' => 'required|string|max:255',
        ];

    }

}
