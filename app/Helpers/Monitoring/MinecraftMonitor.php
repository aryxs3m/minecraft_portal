<?php

namespace App\Helpers\Monitoring;

use App\Helpers\Monitoring\DataHandler\DataHandler;
use App\Services\MinecraftService;
use Illuminate\Support\Str;

class MinecraftMonitor
{
    private $dataHandler;

    private const VALUE_TYPE_FLOAT = 1;
    private const VALUE_TYPE_INTEGER = 2;

    public function __construct(DataHandler $dataHandler)
    {
        $this->dataHandler = $dataHandler;
    }

    public function getData($measure, $amount)
    {
        return $this->dataHandler->getData($measure, $amount);
    }

    public function log()
    {
        $minecraftService = new MinecraftService();
        $reply = $minecraftService->sendRCON("tps");
        $this->storeTPSLog($this->parseTPS($reply));
    }

    private function storeTPSLog($parsedTPS)
    {
        foreach($parsedTPS as $measure => $value)
        {
            $this->dataHandler->writeData($measure, $value);
        }
    }

    private function parseTPS($tpsCommandReply)
    {
        $tpsParts = explode(" ", Str::replace("\n", " ", $tpsCommandReply));
        $memoryParts = explode("/", $tpsParts[12]);

        return [
            'tps_1m' => $this->parseTPSValue($tpsParts[6], self::VALUE_TYPE_FLOAT),
            'tps_5m' => $this->parseTPSValue($tpsParts[7], self::VALUE_TYPE_FLOAT),
            'tps_15m' => $this->parseTPSValue($tpsParts[8], self::VALUE_TYPE_FLOAT),
            'memory_used' => $this->parseTPSValue($memoryParts[0], self::VALUE_TYPE_INTEGER),
            'memory_free' => $this->parseTPSValue($memoryParts[1], self::VALUE_TYPE_INTEGER),
        ];
    }

    private function parseTPSValue($stringValue, $type)
    {
        $outputString = preg_replace('/[^0-9.]/', '', $stringValue);
        switch ($type)
        {
            case self::VALUE_TYPE_FLOAT: return floatval($outputString);
            case self::VALUE_TYPE_INTEGER: return intval($outputString);
            default: return $outputString;
        }
    }
}
