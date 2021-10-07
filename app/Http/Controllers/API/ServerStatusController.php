<?php

namespace App\Http\Controllers\API;

use App\Services\MinecraftService;

class ServerStatusController
{
    public function get(MinecraftService $minecraftService)
    {
        return response()->json($minecraftService->check());
    }
}
