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
            'admin_since' => ['present', 'nullable'],
            'disabled_at' => ['present', 'nullable'],
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
