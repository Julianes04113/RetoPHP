<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required',
                    'string',
                    'email',
                    'max:100',
                    Rule::unique('users')->ignore($this->user()->id)],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'image' => ['nullable', 'image'],
               ];
    }
}
