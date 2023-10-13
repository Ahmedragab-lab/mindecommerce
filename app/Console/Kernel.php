<?php

namespace App\Console;

use App\Console\Commands\DeleteReadNotifications;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    Protected $commands = [
        DeleteReadNotifications::class,
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('read-notification:delete')->hourly();
    }
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
