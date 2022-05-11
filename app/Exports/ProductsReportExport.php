<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductsReportExport implements FromView, ShouldQueue
{
    public function view(): view
    {
        $a = Product::all()->count();
        $b = Product::all()->pluck('stock')->sum();
        $c = Product::all()->pluck('price')->avg();
        $d = Product::all()->map(function ($total) {
            return ['inventario' => $total["stock"]*$total["price"]];
        })->pluck('inventario')->sum();
        $e = Product::all()->where('status', 'LIKE', 'available')->count();
        $f = Product::all()->where('status', 'LIKE', 'unavailable')->count();

        $data = collect([
            $a, $b, $c, $d, $e, $f,
        ]);

        return view('reports.productsinfo', [
            'data' => $data
        ]);
    }
}
