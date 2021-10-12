<?php

namespace App\Http\Controllers;

use App\Helpers\Monitoring\DataHandler\EloquentDataHandler;
use App\Helpers\Monitoring\MinecraftMonitor;
use App\Models\AuthMeUser;
use App\Models\MonitorData;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function test() {
        $mm = new MinecraftMonitor(new EloquentDataHandler(MonitorData::class));
        //dd($mm->getData('tps_1m', 3));

        return view('portal.admin.monitor');
    }

    private function getData() {

    }

    private function writeData() {

    }
}
