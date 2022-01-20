<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Resources\views\Products\index;

class ProductController extends Controller
{
    public function index(){

        $list = Product::all();
       return view('Products.index', compact('list'));
    }

    public function create(){
        return view('Products.create');
    }

    public function store(){
       dd('Estamos en store');
    } 

    public function show($product){
       // return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function edit($product){
        //return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function update($product){
        //return 'Esta es la lista de productos del CONTROLADOR';
    }

    public function destroy($product){
        //return 'Esta es la lista de productos del CONTROLADOR';
    }
}
