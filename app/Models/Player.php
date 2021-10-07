<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "Players";

    protected $fillable = [
        'Nick', 'Skin'
    ];

    public function skin()
    {
        return $this->hasOne(Skin::class, 'Nick', 'Skin');
    }
}
