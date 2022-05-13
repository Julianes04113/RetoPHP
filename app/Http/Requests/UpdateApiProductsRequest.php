<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApiProductsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['min:5', 'max:100'],
            'price' => ['integer', 'min:1000'],
            'stock' => ['integer', 'min:0'],
            'description' => ['min:10', 'max:500'],
            'status' => ['string'],
        ];
    }
}
