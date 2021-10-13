<?php

namespace App\Charts;

use App\Models\MonitorData;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Carbon;

class MonitorPlayersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle(__('frontend.admin.monitoring.players'))
            ->setSubtitle(__('frontend.admin.monitoring.online_players'))
            ->addData(__('frontend.admin.monitoring.players'), MonitorData::getMeasureValues('online'))
            ->setXAxis(MonitorData::getDimensionValues('tps_1m'));
    }
}
