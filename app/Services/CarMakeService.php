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

    public function getActivated()
    {
        return $this->carMakeRepository->query()->select('id','name')->whereActivation(true)->get();
    }

    public function findById($id)
    {
        return $this->carMakeRepository->find($id);
    }

    public function store($newMake)
    {

        $imageName = time() . '.' . $newMake->image->extension();

        $newMake->image->move(public_path('images/car-makes'), $imageName);

        return $this->carMakeRepository->create([
            'name' => $newMake->name,
            'image' => 'images/car-makes/' . $imageName
        ]);

    }

    public function update($newMake, $carMake)
    {
        if ($newMake->image) {
            if(\File::exists($carMake->getRawOriginal('image'))) {
                \File::delete($carMake->getRawOriginal('image'));
            }
            $imageName = time() . '.' . $newMake->image->extension();

            $newMake->image->move(public_path('images/car-makes'), $imageName);
            $carMake->image = 'images/car-makes/' . $imageName;
        }
        $carMake->name = $newMake->name;
        $carMake->save();
    }

    public function toggleActivation($carMakeId)
    {
        $carMake = $this->carMakeRepository->find($carMakeId);
        $carMake->activation = !$carMake->activation;
        $carMake->save();
    }
}
