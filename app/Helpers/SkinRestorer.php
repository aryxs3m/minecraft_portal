<?php

namespace App\Helpers;

use App\Models\Player;
use App\Models\Skin;
use Illuminate\Support\Facades\Auth;

/**
 * Small helper to set skins based on MineSkin's response.
 */
abstract class SkinRestorer
{
    public static function saveSkin($mineSkinResponse)
    {
        $username = Auth::user()->username;
        $transformedName = ' ' . $username;

        if (empty($mineSkinResponse['data']['texture']['value']) || empty($mineSkinResponse['data']['texture']['signature'])) {
            throw new \Exception(__('frontend.skinchange.error_mineskin'));
        }

        $value = $mineSkinResponse['data']['texture']['value'];
        $signature = $mineSkinResponse['data']['texture']['signature'];
        $timestamp = "9223243187835955807";

        // Please don't blame me for this. This is based on the SkinSystems's code
        // and i don't want to decrypt it. If it works, then it works...

        Player::where('Nick', '=', $username)->delete();
        Skin::where('Nick', '=', $username)->orWhere('Nick', '=', $transformedName)->delete();

        Player::create([
            'Nick' => $username,
            'Skin' => $transformedName
        ]);

        Skin::create([
            'Nick' => $transformedName,
            'Value' => $value,
            'Signature' => $signature,
            'timestamp' => $timestamp
        ]);
    }
}
