<?php

namespace App\Models\SkinModels;

class SkinData
{
    private $raw;
    public $timestamp;
    public $profileId;
    public $profileName;
    public $signatureRequired;
    public $skin;
    public $type;

    public function __construct($skinValue)
    {
        $this->raw = json_decode(base64_decode($skinValue));
        try {
            $this->timestamp = $this->raw->timestamp;
            $this->profileId = $this->raw->profileId;
            $this->profileName = $this->raw->profileName;
            $this->signatureRequired = $this->raw->signatureRequired;
            if (isset($this->raw->textures->SKIN)) {
                $this->skin = $this->raw->textures->SKIN->url;
            }
            if (isset($this->raw->textures->SKIN->metadata)) {
                $this->type = $this->raw->textures->SKIN->metadata->model;
            }
        } catch (\Exception $exception)
        {
            throw new \Exception("Ismeretlen felépítésű SkinRestore adat: " + $skinValue);
        }
    }
}
