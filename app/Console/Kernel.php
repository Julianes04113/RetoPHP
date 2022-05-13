<?php

namespace App\Console;

use App\Jobs\CheckPaymentStatusJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\RefreshPaymentsCommand::class
    ];
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new CheckPaymentStatusJob)->everyFiveMinutes();
        $schedule->command('sanctum:prune-expired --hours=24')->daily();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
