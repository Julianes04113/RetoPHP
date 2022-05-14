<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection, WithHeadings, ShouldQueue
{
    public function headings(): array
    {
        return [
            'id',
            'producto',
            'descripcion',
            'precio',
            'cantidad',
            'estado'
        ];
    }
    public function collection()
    {
        return Product::select('id', 'title', 'description', 'price', 'stock', 'status')->get();
    }
}
