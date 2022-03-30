<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Response;
use App\Services\WebService;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function index(User $user)
    {
        $payments = DB::table('orders')->get();
        $userPayments = $payments::where();
        dd($payments);
        return view('payments.index', compact('payments'));
    }
}
