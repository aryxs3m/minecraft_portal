<?php

namespace App\Console\Commands;

use App\Helpers\Monitoring\DataHandler\EloquentDataHandler;
use App\Helpers\Monitoring\MinecraftMonitor;
use App\Models\MonitorData;
use Illuminate\Console\Command;

class MonitorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mcp:monitor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Records current TPS and memory usage data.';

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
        try {
            $mm = new MinecraftMonitor(new EloquentDataHandler(MonitorData::class));
            $mm->log();
            return 0;
        } catch (\Exception $exception)
        {
            return 1;
        }
    }
}
