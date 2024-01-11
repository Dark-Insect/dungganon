<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // First Scheduled
        $setting = DB::table('email_setting')->first();

        switch($setting->mail_schedule)
        {
            case "every_minute":
                $schedule->command('app:member-notifications')->everyMinute();
            case "every_day":
                $schedule->command('app:member-notifications')->daily();
            case "every_week":
                $schedule->command('app:member-notifications')->weekly();
            case "every_month":
                $schedule->command('app:member-notifications')->monthly();
        }
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
