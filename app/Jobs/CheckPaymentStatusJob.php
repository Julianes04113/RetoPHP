<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\WebService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckPaymentStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public WebService $webService;

    public function handle()
    {
        $idsToProcess = Order::select('id', 'status', 'requestId')
                ->where('status', 'LIKE', 'PENDING')
                ->get();
        
        $webService = new WebService;

        foreach ($idsToProcess as $order) {
            $processedIds = $webService->getRequestInformation($order);

            $order->status = $processedIds->status->status;
            
            $order->save();
        }
    }
}
