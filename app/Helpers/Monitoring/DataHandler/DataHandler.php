<?php

namespace App\Helpers\Monitoring\DataHandler;

interface DataHandler
{
    public function getData($measure, $amount):array;
    public function writeData($measure, $value);
}
