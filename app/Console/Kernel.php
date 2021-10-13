<?php

namespace App\Console;

use App\Console\Commands\AddAdminCommand;
use App\Console\Commands\CleanMonitoringTableCommand;
use App\Console\Commands\MonitorCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AddAdminCommand::class,
        CleanMonitoringTableCommand::class,
        MonitorCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('mcp:monitor')->everyMinute();
        $schedule->command('mcp:clean_monitoring_table')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
