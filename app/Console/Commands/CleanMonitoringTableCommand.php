<?php

namespace App\Console\Commands;

use App\Models\MonitorData;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CleanMonitoringTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mcp:clean_monitoring_table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes monitoring data that are older than 30 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date  = Carbon::now()->subDays(config('app.monitoring_clear_after'));
        MonitorData::where('created_at', '<=', $date)->delete();
        return 0;
    }
}
