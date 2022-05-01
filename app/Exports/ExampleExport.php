<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExampleExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Nombre_del_Producto',
            'Descripción',
            'Precio',
            'Cantidad',
            'Estado'
        ];
    }

    public function collection()
    {
        return Product::select('title', 'description', 'price', 'stock', 'status')->get();
    }
}
