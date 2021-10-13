<?php

namespace App\Charts;

use App\Models\MonitorData;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Carbon;

class MonitorPingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle(__('frontend.admin.monitoring.ping'))
            ->setSubtitle(__('frontend.admin.monitoring.ping_in_ms'))
            ->addData(__('frontend.admin.monitoring.ping'), MonitorData::getMeasureValues('ping'))
            ->setXAxis(MonitorData::getDimensionValues('tps_1m'));
    }
}
