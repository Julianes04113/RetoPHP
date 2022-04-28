<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use App\Jobs\CheckPaymentStatusJob;

class RefreshPaymentsCommand extends Command
{
    protected $signature = 'RefreshPaymentsStatus';

    protected $description = 'Este comando refrescará el estado de un pago en la DB cada 5 minutos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        return CheckPaymentStatusJob::dispatch();
    }
}
