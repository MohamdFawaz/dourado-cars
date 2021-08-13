<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\Setting;
use phpDocumentor\Reflection\Types\This;

class SettingRepository extends Repository
{
    protected $model;

    /**
     * SettingRepository constructor.
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
