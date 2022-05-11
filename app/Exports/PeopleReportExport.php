<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Queue\ShouldQueue;

class PeopleReportExport implements FromView, ShouldQueue
{

    public function view(): view
    {
        $a = User::role('admin')->count();
        $b = Auth::user()->name;
        $c = User::role('customer')->count();
        $d = User::has('orders')->get()->count();
        $e = User::whereHas('orders', function (Builder $query) {
            $query->where('status', 'LIKE', 'APPROVED');
        })->count();
        $f = ($e/$c)*100;

        $data = collect([
            $a, $b, $c, $d, $e, $f,
        ]);

        return view('reports.people', [
            'data' => $data
        ]);
    }
}
