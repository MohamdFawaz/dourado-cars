<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Mail\SellCarMail;
use App\Services\CarMakeService;
use App\Services\CarService;
use App\Services\HomepageBannerService;
use Illuminate\Http\Request;
use KgBot\LaravelLocalization\Facades\ExportLocalizations as ExportLocalization;

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
        $messages = ExportLocalization::export()->toFlat();
        return view('front.pages.sell_car', compact('messages'));
    }

    public function getCarConditionOptions()
    {
        $conditions = [trans('web.sell_a_car.condition_options.extra_clean'),trans('web.sell_a_car.condition_options.clean'),trans('web.sell_a_car.condition_options.average'),trans('web.sell_a_car.condition_options.below_average'),trans('web.sell_a_car.condition_options.i_dont_know')];
        $accidentOptions = [trans('web.sell_a_car.accident_options.yes'),trans('web.sell_a_car.accident_options.no'),trans('web.sell_a_car.accident_options.i_dont_know')];
        return response()->json(compact('conditions','accidentOptions'));
    }

    public function submitSellCar(Request $request)
    {
        try {
            \Mail::to('mohamdfawaz93@gmail.com')->send(new SellCarMail($request->all()));
            return response()->json(['message' => trans('web.sell_a_car.success_message')]);
        } catch (\Exception $e) {
            reportException($e);
            return response()->json(['message' => trans('web.sell_a_car.failed_message')]);
        }
    }
}
