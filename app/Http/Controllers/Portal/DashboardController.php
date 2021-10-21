<?php

namespace App\Http\Controllers\Portal;

use App\Helpers\MineSkinUploader;
use App\Helpers\SkinRestorer;
use App\Models\AuthMeUser;
use App\Models\Skin;
use App\Services\MinecraftService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MCServerStatus\MCPing;

class DashboardController
{
    public function index(MinecraftService $minecraftService)
    {
        return view('portal.index', [
            'serverInfo' => $minecraftService->check(),
            'user' => Auth::user()
        ]);
    }
}
