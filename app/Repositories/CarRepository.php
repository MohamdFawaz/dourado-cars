<?php

namespace App\Repositories;

use App\Models\Car;
use phpDocumentor\Reflection\Types\This;

class CarRepository extends Repository
{
    protected $model;

    /**
     * CarRepository constructor.
     * @param Car $model
     */
    public function __construct(Car $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function store($newCar)
    {
        $car = new $this->model;

        if ($newCar->image) {
            $imageName = time() . '.' . $newCar->image->extension();
            $newCar->image->move(public_path('images/cars'), $imageName);
        }
        $car->car_make_id = $newCar->car_make_id;
        $car->car_model_id = $newCar->car_model_id;
        $car->kilometers = $newCar->kilometers;
        $car->year = $newCar->year;
        $car->warranty = isset($newCar->warranty);
        $car->price = $newCar->price;
        $car->color = $newCar->color;
        $car->number_of_doors = $newCar->number_of_doors;
        $car->number_of_cylinders = $newCar->number_of_cylinders;
        $car->horse_power = $newCar->horse_power;
        $car->image = isset($imageName) ? 'images/cars/' . $imageName : null;

        foreach ($newCar->name as $locale => $value) {
            $car->translateOrNew($locale)->name = $value;
        }

        foreach ($newCar->title as $locale => $value) {
            $car->translateOrNew($locale)->title = $value;
        }

        foreach ($newCar->specs as $locale => $value) {
            $car->translateOrNew($locale)->specs = $value;
        }

        foreach ($newCar->transmission_type as $locale => $value) {
            $car->translateOrNew($locale)->transmission_type = $value;
        }
        foreach ($newCar->body_type as $locale => $value) {
            $car->translateOrNew($locale)->body_type = $value;
        }
        foreach ($newCar->fuel_type as $locale => $value) {
            $car->translateOrNew($locale)->fuel_type = $value;
        }
        foreach ($newCar->additional_information as $locale => $value) {
            $car->translateOrNew($locale)->additional_information = $value;
        }
        $car->save();
        return $car;
    }

    public function updateCarDetails($newCar, $id)
    {
        $car = $this->find($id);

        if ($newCar->image) {
            $imageName = time() . '.' . $newCar->image->extension();
            $newCar->image->move(public_path('images/cars'), $imageName);
        }
        $car->car_make_id = $newCar->car_make_id;
        $car->car_model_id = $newCar->car_model_id;
        $car->kilometers = $newCar->kilometers;
        $car->year = $newCar->year;
        $car->warranty = isset($newCar->warranty);
        $car->price = $newCar->price;
        $car->color = $newCar->color;
        $car->number_of_doors = $newCar->number_of_doors;
        $car->number_of_cylinders = $newCar->number_of_cylinders;
        $car->horse_power = $newCar->horse_power;
        if (isset($imageName)) {
            $car->image =  'images/cars/' . $imageName;
        }

        foreach ($newCar->name as $locale => $value) {
            $car->translateOrNew($locale)->name = $value;
        }

        foreach ($newCar->title as $locale => $value) {
            $car->translateOrNew($locale)->title = $value;
        }

        foreach ($newCar->specs as $locale => $value) {
            $car->translateOrNew($locale)->specs = $value;
        }

        foreach ($newCar->transmission_type as $locale => $value) {
            $car->translateOrNew($locale)->transmission_type = $value;
        }
        foreach ($newCar->body_type as $locale => $value) {
            $car->translateOrNew($locale)->body_type = $value;
        }
        foreach ($newCar->fuel_type as $locale => $value) {
            $car->translateOrNew($locale)->fuel_type = $value;
        }
        foreach ($newCar->additional_information as $locale => $value) {
            $car->translateOrNew($locale)->additional_information = $value;
        }
        $car->save();
        return $car;
    }
}
