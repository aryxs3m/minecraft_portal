<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RCONTerminalParser;
use App\Http\Controllers\Controller;
use App\Models\AuthMeUser;
use App\Models\SimpleRCONElement;
use App\Services\MinecraftService;
use Illuminate\Http\Request;

class SimpleRCONController extends Controller
{
    public function index()
    {
        return view('portal.admin.simplercon', [
            'commands' => SimpleRCONElement::all(),
            'players' => AuthMeUser::where('isLogged', true)->get()
        ]);
    }

    public function terminal(Request $request, MinecraftService $minecraftService)
    {
        $validated = $request->validate([
            'command' => 'required|string|min:1',
        ]);

        return ["message" =>
            RCONTerminalParser::convert($minecraftService->sendRCON($validated['command']))
        ];
    }

    public function send(Request $request, MinecraftService $minecraftService)
    {
        $validated = $request->validate([
            'command' => 'exists:simple_r_c_o_n_elements,id'
        ]);

        $command = SimpleRCONElement::find($validated['command']);

        try {
            $message = $minecraftService->sendRCON($command->value);
            if (empty($message)) {
                $message = "OK.";
            }
            return redirect()->back()->with('success', $message);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function kick(Request $request, MinecraftService $minecraftService)
    {
        $validated = $request->validate([
            'username' => 'exists:authme,username'
        ]);

        $command = "kick " . $validated['username'];

        try {
            $message = $minecraftService->sendRCON($command);
            if (empty($message)) {
                $message = "OK.";
            }
            return redirect()->back()->with('success', $message);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
