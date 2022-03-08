<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:100'],
            'email' => ['required', 'email', 'min:5', 'max:100'],
        ];
    }

     public function messages(): array
    {
        return [
            'min' => 'El título debe tener al menos 5 caracteres, el stock obviamente es mayor a 1 y la descripción debe tener al menos 10 caracteres también',
            'required' => 'Esto va sí o sí, le guste o no'
        ];
    }
}
