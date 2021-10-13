<?php

namespace App\Models;

use App\Models\Traits\EloquentChart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitorData extends Model
{
    use HasFactory, EloquentChart;

    protected $fillable = [
        'measure', 'value'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
