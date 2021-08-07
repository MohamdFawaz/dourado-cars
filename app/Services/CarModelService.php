<?php

namespace App\Services;


use App\Repositories\CarMakeRepository;
use App\Repositories\CarModelRepository;

class CarModelService
{
    protected $carModelRepository;
    public $carMakeService;

    public function __construct(CarModelRepository $carModelRepository, CarMakeService $carMakeService)
    {
        $this->carModelRepository = $carModelRepository;
        $this->carMakeService = $carMakeService;
    }

    public function get()
    {
        return $this->carModelRepository->query()->with('carMake:id,name,image')->get();
    }


    public function findById($id)
    {
        return $this->carModelRepository->find($id);
    }

    public function store($newModel)
    {
        return $this->carModelRepository->create([
            'name' => $newModel->name,
            'car_make_id' => $newModel->car_make_id
        ]);

    }

    public function update($newModel, $carModel)
    {
        $carModel->name = $newModel->name;
        $carModel->car_make_id = $newModel->car_make_id;
        $carModel->save();
    }


    public function destroy($id)
    {
        $this->carModelRepository->destroy($id);
    }
}
