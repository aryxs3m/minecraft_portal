<?php

namespace App\Models\Traits;

use Illuminate\Support\Carbon;

trait EloquentChart
{
    public static function getMeasureValues($measure, $limit = 60, $orderBy = 'created_at', $valueField = 'value')
    {
        return array_reverse(
            self::query()
                ->where('measure', '=', $measure)
                ->latest($orderBy)
                ->limit($limit)
                ->pluck($valueField)
                ->toArray()
        );
    }

    public static function getDimensionValues($measure, $dimension = 'created_at', $limit = 60, $timeFormat = "h:i")
    {
        return array_reverse(
            self::query()
                ->where('measure', '=', $measure)
                ->latest()
                ->limit($limit)
                ->pluck($dimension)
                ->map(function(Carbon $m) use($timeFormat) {
                    return $m->format($timeFormat);
                })
                ->toArray()
        );
    }
}
