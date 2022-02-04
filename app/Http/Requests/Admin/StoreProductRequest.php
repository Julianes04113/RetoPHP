<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'code' => ['required', 'size:10', 'alpha_num', 'starts_with:MERCA'],
            'title' => ['required', 'min:5', 'max:100'],
            'price' => ['required', 'integer', 'min:1'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:10', 'max:500'],
            'status' => ['required'],
        ];
    }

     public function messages(): array
    {
        return [
            'code.starts_with:MERCA' => 'Vea mijo! el :attribute debe seguir el formato MERCA##### y debe ser único',
            'min' => 'Mandamiento número 11, nunca dividir por cero! (osea agreguele algo mayor a cero, no sea así)'
        ];
    }
}
