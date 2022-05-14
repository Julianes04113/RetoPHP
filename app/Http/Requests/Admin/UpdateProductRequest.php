<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['present', 'min:5', 'max:100'],
            'price' => ['present', 'integer', 'min:1000'],
            'stock' => ['present', 'integer', 'min:0'],
            'description' => ['present', 'min:10', 'max:500'],
            'status' => ['present', 'string'],
        ];
    }
}
