<?php

namespace App\Repositories;

use App\Models\PanoramicCar;

class PanoramicCarRepository extends Repository
{
    protected $model;

    /**
     * PanoramicCarRepository constructor.
     * @param PanoramicCar $model
     */
    public function __construct(PanoramicCar $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function store($newCar)
    {
        $car = new $this->model;
        $imageName = '';
        if ($newCar->image) {
            $imageName = time() . '.' . $newCar->image->extension();
            $newCar->image->move(public_path('images/panoramic_cars'), $imageName);
        }
        $car->image = 'images/panoramic_cars/' . $imageName;
        foreach ($newCar->name as $locale => $value) {
            $car->translateOrNew($locale)->name = $value;
        }

        $car->save();
        return $car;
    }

    public function updateCarDetails($updatedCar, $id)
    {
        $car = $this->find($id);

        if ($updatedCar->image) {
            $imageName = time() . '.' . $updatedCar->image->extension();
            $updatedCar->image->move(public_path('images/panoramic_cars'), $imageName);
            $car->image = 'images/panoramic_cars/' . $imageName;
        }

        foreach ($updatedCar->name as $locale => $value) {
            $car->translateOrNew($locale)->name = $value;
        }

        $car->save();
        return $car;
    }
}
