<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use MCServerStatus\MCPing;
use Thedudeguy\Rcon;

class MinecraftService
{
    public function check()
    {
        return Cache::remember('mcservice', 60, function () {
            return MCPing::check(config('minecraft.server'), config('minecraft.query_port'));
        });
    }

    public function sendRCON($command): string
    {
        $rcon = new Rcon(
            config('minecraft.server'),
            config('minecraft.rcon_port'),
            config('minecraft.rcon_password'),
            config('minecraft.rcon_timeout')
        );

        if ($rcon->connect()) {
            $rcon->sendCommand($command);
            if (Auth::check()) {
                activity()
                    ->useLog("rcon")
                    ->causedBy(Auth::user())
                    ->log('RCON sent: ' . $command);
            }
            return trim($rcon->getResponse());
        } else {
            throw new \Exception("Cannot connect to RCON. Check .env parameters!");
        }
    }
}
