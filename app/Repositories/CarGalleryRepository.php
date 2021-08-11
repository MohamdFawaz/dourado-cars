<?php

namespace App\Repositories;

use App\Models\CarGallery;

class CarGalleryRepository extends Repository
{
    protected $model;

    /**
     * CarGallerylRepository constructor.
     * @param CarGallery $model
     */
    public function __construct(CarGallery $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
