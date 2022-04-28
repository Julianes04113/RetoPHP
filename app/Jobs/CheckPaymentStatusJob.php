<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\WebService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckPaymentStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $idsToProcess;

    public function __construct()
    {
        $this->idsToProcess = Order::select('status', 'requestId')
                ->get();
    }

    public function handle()
    {
        foreach ($this->idsToProcess as $order) {
            $processedIds = $this->WebService->getRequestInformation($order->requestId);
            if ($processedIds->status->status != 'APPROVED') {
                $order->status = $processedIds->status->status;
                $order->save();
            }
        }
    }
}
