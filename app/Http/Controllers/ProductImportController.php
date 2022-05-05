<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ExampleExport;
use App\Imports\ProductsImport;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    
    public function index()
    {
        return view('Imports.index');
    }

    public function import(Request $request): RedirectResponse
    {
        Excel::import(new ProductsImport, 'Importe.xlsx');

        return redirect()->back()->with('sucess', 'Productos importados cuasisatisfactoriamente');
    }

    public function example()
    {
        return Excel::download(new ExampleExport, 'ejemplo.xlsx');
    }
}
