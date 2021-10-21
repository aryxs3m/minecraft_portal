<?php

namespace App\Http\Controllers\Admin;

use App\Charts\MonitorPingChart;
use App\Charts\MonitorPlayersChart;
use App\Charts\MonitorRAMChart;
use App\Charts\MonitorTPSChart;
use App\Helpers\Monitoring\DataHandler\EloquentDataHandler;
use App\Helpers\Monitoring\MinecraftMonitor;
use App\Http\Controllers\Controller;
use App\Models\AuthMeUser;
use App\Models\MonitorData;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function test(MonitorTPSChart $monitorTPSChart, MonitorRAMChart $monitorRAMChart, MonitorPingChart $monitorPingChart, MonitorPlayersChart $monitorPlayersChart)
    {
        $lastData = MonitorData::where('measure', '=', 'tps_1m')->latest()->first();

        return view('portal.admin.monitor', [
            'tps_chart' => $monitorTPSChart->build(),
            'ram_chart' => $monitorRAMChart->build(),
            'players_chart' => $monitorPlayersChart->build(),
            'ping_chart' => $monitorPingChart->build(),
            'no_data' => ($lastData === null),
            'tps_warning' => ($lastData->value < 20)
        ]);
    }

    private function getData()
    {
    }

    private function writeData()
    {
    }
}
