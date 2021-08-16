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
        return $this->carRepository->query()->activated()->get();
    }

    public function getActivatePaginated($perPage = 10)
    {
        $filters = $this->formatGetCarFilters();
        $query =  $this->carRepository->query()->with('carMake:id,name');
        if (count($filters)) {
            foreach ($filters as $filter) {
                if ($filter[1] == 'in') {
                    $query->whereIn($filter[0],$filter[2]);
                }else{
                    $query->where($filter[0],$filter[1],$filter[2]);
                }
            }
        }
        return $query->paginate($perPage);
    }

    public function findById($id, $with = [])
    {
        $query = $this->carRepository->query();
        if ($with) {
            $query->with($with);
        }
        return $query->find($id);
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

    public function getHomepageCars($limit = 6)
    {
        return $this->carRepository->query()->limit($limit)->get();
    }

    public function formatGetCarFilters()
    {
        $filters = [];
        if (request()->get('car_make_ids')) {
            $filters = [['car_make_id', 'in', request()->get('car_make_ids')]];
        }
        if (request()->route()->parameters() && request()->route()->parameter('id')) {
            $filters = [['id', '<>', request()->route()->parameter('id')]];
        }
        return $filters;
    }

    public function validateCompareRequest()
    {
        return validator(request()->all(), [
            'car_ids' => 'required'
        ])->validate();
    }

    public function getCarMakeYears($carMakeId)
    {
        return $this->carRepository->query()->select('year')
            ->where('car_make_id',$carMakeId)
            ->groupBy('year')->get();
    }
}
