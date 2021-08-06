<?php

namespace App\Services;


use App\Repositories\CarModelRepository;

class CarModelService
{
    private $carModelRepository;

    public function __construct(CarModelRepository $carModelRepository)
    {
        $this->carModelRepository = $carModelRepository;
    }

    public function get()
    {
        return $this->carModelRepository->query()->get();
    }
}
