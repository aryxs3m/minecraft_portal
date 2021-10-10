<?php

namespace App\Models;

use App\Models\SkinModels\SkinData;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Skin extends Model
{

    public $incrementing = false;
    public $timestamps = false;

    protected $keyType = 'string';
    protected $primaryKey = 'Nick';

    protected $table = "Skins";

    protected $fillable = [
        'Value', 'Signature', 'Nick', 'timestamp'
    ];

    public function getValue()
    {
        return new SkinData($this->Value);
    }
}
