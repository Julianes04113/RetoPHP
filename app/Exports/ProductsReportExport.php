<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsReportExport implements FromView, ShouldQueue
{
    public function view(): view
    {
        $a = Product::all()->count();
        $b = ;
        $c = ;
        $d = ;
        $e = ;
        $f = ($e/$c)*100;

        $data = collect([
            $a, $b, $c, $d, $e, $f,
        ]);

        return view('reports.productsinfo', [
            'data' => $data
        ]);
    }
}
}
