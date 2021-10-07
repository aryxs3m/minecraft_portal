<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use MCServerStatus\MCPing;

class MinecraftService
{
    public function check()
    {
        return Cache::remember('mcservice', 60, function(){
            return MCPing::check(config('minecraft.server'), config('minecraft.query_port'));
        });
    }
}
