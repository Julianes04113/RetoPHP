<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\Payment;
use App\Services\WebService;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CheckPaymentStatusJob //implements ShouldQueue ->la quiero inmediata
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $idsToProcess;

    public function __construct()
    {
        $this->idsToProcess = Order::select('requestId') //viene de order
                ->where('requestStatus', 'LIKE', 'PENDING')
                ->get();
    }

    public function handle()
    {
        foreach ($this->idsToProcess as $order) {
            $processedIds = $this->WebService->getRequestInformation($order->requestId);
            if ($processedIds->status->status != 'PENDING') {
                $order->requestStatus = $processedIds->status->status;
                $order->save();
            }
        }
    }
}
