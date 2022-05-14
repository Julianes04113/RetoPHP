<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Exports\OrdersReportExport;
use App\Exports\PeopleReportExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsReportExport;
use Illuminate\Http\RedirectResponse;
use App\Notifications\ExportNotification;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(): View
    {
        return view('Reports.index');
    }

    public function export(Request $request)
    {
        $typeOfReport = $request->export;
        $user = Auth::user();
        $user->notify(new ExportNotification());

        if ($typeOfReport == 'people') {
            return Excel::download(new PeopleReportExport, 'gentuza.xlsx');
        } elseif ($typeOfReport == 'products') {
            return Excel::download(new ProductsReportExport, 'infoproductos.xlsx');
        } elseif ($typeOfReport == 'orders') {
            return Excel::download(new OrdersReportExport, 'ordenes.xlsx');
        }
    }
}
