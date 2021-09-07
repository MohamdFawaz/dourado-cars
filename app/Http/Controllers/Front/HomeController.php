<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Services\CarMakeService;
use App\Services\CarService;
use App\Services\HomepageBannerService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $carMakeService, $carService, $homeBannerService;

    public function __construct(CarMakeService $carMakeService, CarService $carService, HomepageBannerService $homepageBannerService)
    {
        $this->carMakeService = $carMakeService;
        $this->carService = $carService;
        $this->homeBannerService = $homepageBannerService;
    }


    public function home()
    {
        $carMakes = $this->carMakeService->getHomepageCarMakes();
        $featuredCars = $this->carService->getHomepageCars();
        $banners = $this->homeBannerService->get();
        return view('front.pages.home', compact('carMakes','featuredCars','banners'));
    }

    public function cars(Request $request)
    {
        $cars = $this->carService->listCars($request->all());
        $carMakes = $this->carMakeService->getActivated();
        $priceRange = $this->carService->getPriceRange();
        return view('front.pages.list_cars', compact('cars', 'carMakes', 'priceRange'));
    }

    public function showCar($carId)
    {
        $car = $this->carService->showCarById($carId);
        return view('front.pages.car_details', compact('car'));
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function sellCar()
    {
        return view('front.pages.sell_car');
    }
}
