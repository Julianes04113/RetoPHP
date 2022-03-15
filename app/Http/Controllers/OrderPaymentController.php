<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{

    public function create(Order $order)
    {
        return view('payments.create')->with([
            'order'=> $order,
        ]);
    }


    public function store(Request $request, Order $order)
    {
        //
    }

}
