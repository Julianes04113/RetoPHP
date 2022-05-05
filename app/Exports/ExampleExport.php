<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        return Product::select('title', 'description', 'price', 'stock', 'status')
            ->where('id', 'LIKE', $user->id)
            ->get();
    }
}
