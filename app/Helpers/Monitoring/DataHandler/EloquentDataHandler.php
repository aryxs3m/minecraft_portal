<?php

namespace App\Helpers\Monitoring\DataHandler;

use Illuminate\Database\Eloquent\Model;

class EloquentDataHandler implements DataHandler
{
    /**
     * @var $model
     */
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getData($measure, $amount): array
    {
        $data = $this->model::where('measure', '=', $measure)->orderBy('created_at', 'DESC')->limit($amount)->get();
        return $data->toArray();
    }

    public function writeData($measure, $value)
    {
        return $this->model::create([
            'measure' => $measure,
            'value' => $value
        ]);
    }
}
