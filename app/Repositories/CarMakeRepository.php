<?php

namespace App\Repositories;

use App\Models\CarMake;

class CarMakeRepository extends Repository
{
    protected $model;

    /**
     * CarMakeRepository constructor.
     * @param CarMake $model
     */
    public function __construct(CarMake $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
