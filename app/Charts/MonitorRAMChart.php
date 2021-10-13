<?php

namespace App\Charts;

use App\Models\MonitorData;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Carbon;

class MonitorRAMChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle(__('frontend.admin.monitoring.memory'))
            ->setSubtitle(__('frontend.admin.monitoring.ram_usage'))
            ->addData(__('frontend.admin.monitoring.used_memory'), MonitorData::getMeasureValues('memory_used'))
            ->addData(__('frontend.admin.monitoring.all_memory'), MonitorData::getMeasureValues('memory_free'))
            ->setXAxis(MonitorData::getDimensionValues('memory_used'));
    }
}
