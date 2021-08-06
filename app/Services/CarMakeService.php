<?php

namespace App\Services;


use App\Repositories\CarMakeRepository;

class CarMakeService
{
    private $carMakeRepository;

    public function __construct(CarMakeRepository $carMakeRepository)
    {
        $this->carMakeRepository = $carMakeRepository;
    }

    public function get()
    {
        return $this->carMakeRepository->query()->get();
    }
}
