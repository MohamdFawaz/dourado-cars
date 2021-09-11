<?php

namespace App\Services;


use App\Repositories\PanoramicCarRepository;

class PanoramicCarService
{
    private $repository;

    public function __construct(PanoramicCarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get()
    {
        return $this->repository->query()->get();
    }

    public function findById($id)
    {
        return $this->repository->find($id);
    }

    public function count()
    {
        return $this->repository->query()->count();
    }

    public function store($newCar)
    {
        return $this->repository->store($newCar);
    }

    public function update($updatedCar, $car)
    {
        return $this->repository->updateCarDetails($updatedCar, $car);
    }

    public function destroy($id)
    {
        $car = $this->findById($id);
        if ($car->delete())
            $car->deleteImage();
        return $car;
    }

}
