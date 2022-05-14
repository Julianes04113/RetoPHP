<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExampleExport implements FromCollection, WithHeadings, ShouldQueue
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
        $user = Auth::user();
        return Product::select('id', 'title', 'description', 'price', 'stock', 'status')
            ->where('id', 'LIKE', $user->id)
            ->get();
    }
}
