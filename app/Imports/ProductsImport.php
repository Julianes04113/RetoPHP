<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'title' => $row['Nombre'],
            'description' => $row['Descripción'],
            'price' => $row['Valor'],
            'stock' => $row['Cantidad'],
            'status' => $row['Estado'],
        ]);
    }
}
