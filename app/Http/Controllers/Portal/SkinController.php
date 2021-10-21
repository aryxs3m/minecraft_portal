<?php

namespace App\Http\Controllers\Portal;

use App\Helpers\MineSkinUploader;
use App\Helpers\SkinRestorer;
use App\Models\AuthMeUser;
use Illuminate\Http\Request;

class SkinController
{
    public function skin()
    {
        $skinUrl = "/assets/steve.png";
        $skinType = "normal";

        $player = AuthMeUser::with(['player', 'player.skin'])->find(4)->player;
        if ($player) {
            $skinInfo = $player->skin->getValue();
            if (!empty($skinInfo->skin)) {
                $skinUrl = $skinInfo->skin;
                $skinType = $skinInfo->type;
            }
        }

        return view(
            'portal.skin',
            compact('skinUrl', 'skinType')
        );
    }

    public function skinSave(Request $request)
    {
        $validated = $request->validate([
            'skin_type' => 'required|integer|min:1|max:2',
            'skin_file' => 'required|image'
        ]);

        try {
            $response = MineSkinUploader::upload($validated['skin_type'], $validated['skin_file']);
            SkinRestorer::saveSkin($response);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

        return redirect()->to("/skin");
    }
}
