<?php

namespace App\Services;


use App\Repositories\CarRepository;

class CarService
{
    private $carRepository;
    public $carMakeService, $carModelService;

    public function __construct(CarRepository $carRepository, CarMakeService $carMakeService, CarModelService $carModelService)
    {
        $this->carRepository = $carRepository;
        $this->carMakeService = $carMakeService;
        $this->carModelService = $carModelService;
    }

    public function get()
    {
        return $this->carRepository->query()->with(['carMake:id,name,image', 'carModel:id,name'])->get();
    }

    public function getActivated()
    {
        return $this->carRepository->query()->select('id', 'name')->whereActivation(true)->get();
    }

    public function findById($id)
    {
        return $this->carRepository->find($id);
    }

    public function findByIdWithGallery($id)
    {
        return $this->carRepository->query()->with('gallery')->find($id);
    }

    public function store($newCar)
    {
        return $this->carRepository->store($newCar);
    }

    public function update($newCar, $id)
    {
        return $this->carRepository->updateCarDetails($newCar, $id);
    }

    public function destroy($id)
    {
        $car = $this->findById($id);
        if ($car->delete()) {
//           $car->deleteImage();
        }
    }

    public function toggleActivation($carMakeId)
    {
        $carMake = $this->carRepository->find($carMakeId);
        $carMake->activation = !$carMake->activation;
        $carMake->save();
    }

    public function count()
    {
        return $this->carRepository->query()->count();
    }

}
