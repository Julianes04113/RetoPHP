<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdersReportExport implements FromView, ShouldQueue
{

    public function view(): View
    {
        $a = Order::all()->count();
        $b = Order::select('id', 'status')->where('status', 'LIKE', 'APPROVED')->count();
        $c = Order::select('id', 'status')->where('status', 'LIKE', 'PENDING')->count();
        $d = Order::select('id', 'status')->where('status', 'LIKE', 'REJECTED')->count();
        $e = ($b/$a)*100;
        $f = Order::all()->pluck('amount')->avg();
        $g = Order::all()->pluck('amount')->sum();
        $h = Order::all()->where('status', 'LIKE', 'APPROVED')->pluck('amount')->sum();
        $i = ($h/$g)*100;

        $data = collect([
            $a, $b, $c, $d, $e, $f, $g, $h, $i
        ]);

        return view('reports.orders', [
            'data' => $data
        ]);
    }
}
