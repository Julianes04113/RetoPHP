<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:100'],
            'price' => ['required', 'integer', 'min:1000'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:10', 'max:500'],
            'status' => ['required'],
            'images' => ['required', 'array'],
            'images.*' => ['image']
        ];
    }

    public function messages(): array
    {
        return [
            'min' => 'Debe contener al menos 5 caracteres y un máximo de 100',
            'required' => 'Esto va sí o sí, le guste o no'
        ];
    }
}
