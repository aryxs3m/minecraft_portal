<?php

namespace App\Charts;

use App\Models\MonitorData;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Carbon;

class MonitorTPSChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle(__('frontend.admin.monitoring.tps'))
            ->setSubtitle(__('frontend.admin.monitoring.server_ticks_per_seconds'))
            ->addData(__('frontend.admin.monitoring.1_min'), MonitorData::getMeasureValues('tps_1m'))
            ->addData(__('frontend.admin.monitoring.5_min'), MonitorData::getMeasureValues('tps_5m'))
            ->addData(__('frontend.admin.monitoring.15_min'), MonitorData::getMeasureValues('tps_15m'))
            ->setXAxis(MonitorData::getDimensionValues('tps_1m'));
    }
}
