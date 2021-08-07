<?php

namespace App\Repositories;

use App\Models\CarModel;

class CarModelRepository extends Repository
{
    protected $model;

    /**
     * CarModelRepository constructor.
     * @param CarModel $model
     */
    public function __construct(CarModel $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
