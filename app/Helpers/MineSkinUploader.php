<?php

namespace App\Helpers;

use CURLFile;
use Illuminate\Http\UploadedFile;

/**
 * This code is based on "SkinSystem": https://github.com/riflowth/skinsystem
 */
abstract class MineSkinUploader
{

    public static function upload(int $type, UploadedFile $skinFile)
    {
        $postparams = [
            'visibility' => 0,
            'model' => ($type == 1) ? '' : 'slim',
            'file' => new CURLFile($skinFile->getPathname(),
                                   $skinFile->getMimeType(),
                                   $skinFile->getFilename())
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mineskin.org/generate/upload");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postparams);
        $response = curl_exec($ch);
        curl_close($ch);
        if($response == false){
            throw new \Exception("Hiba történt a Skin feltöltése során!");
        }

        return json_decode($response, true);
    }
}
