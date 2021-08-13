<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Services\CarMakeService;
use App\Services\CarService;

class HomeController extends Controller
{

    private $carMakeService, $carService;

    public function __construct(CarMakeService $carMakeService, CarService $carService)
    {
        $this->carMakeService = $carMakeService;
        $this->carService = $carService;
    }


    public function home()
    {
        $carMakes = $this->carMakeService->getActivated();
        $featuredCars = $this->carService->getHomepageCars();
        return view('front.home', compact('carMakes','featuredCars'));
    }
}
