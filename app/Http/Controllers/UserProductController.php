<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Resources\views\Products\index;
use App\Http\Requests\Admin\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\User;

class UserProductController extends Controller
{
    public function index(Request $request): View
    {
       $productSearch=trim($request->get('UProductSearchBar'));
       
       $searched = Product::select('id','title','description','price','stock','status')
            ->filter($productSearch)
            ->orderBy('id','asc')
            ->paginate(10);
    return view('UserProduct.index', compact('productSearch','searched'));
    }

    public function show($product): View
    {
       $product = Product::findOrFail($product);

       return view('products.show')->with(['product'=> $product], ['success','Producto agregado al carrito correctamente']);
    }

}