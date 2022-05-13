<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Exports\ExampleExport;
use App\Exports\ProductsExport;
use App\Http\Requests\ImportFile;
use App\Imports\ProductsImport;
use App\Notifications\ImportNotification;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;

class ProductImportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    
    public function index(): View
    {
        return view('Imports.index');
    }

    public function import(ImportFile $request): RedirectResponse
    {
        Excel::import(new ProductsImport, $request->file);

        $user = Auth::user();

        $user->notify(new ImportNotification());

        return redirect()->back()->with('success', 'La cola de trabajo para importar archivos fue exitosa,
        favor revisar su correo electrónico en unos momentos para revisar el estado del importe');
    }

    public function example()
    {
        return Excel::download(new ExampleExport, 'ejemplo.xlsx');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'listadoproductos.xlsx');
    }
}
