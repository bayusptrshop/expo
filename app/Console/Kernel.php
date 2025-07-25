<?php


namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Menjalankan perintah setiap 10 menit
        $schedule->command('import:peserta')->everyTenMinutes();
    }

    protected $commands = [
    ];
}
