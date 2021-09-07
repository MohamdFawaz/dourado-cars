<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Mail\GetInTouchMail;
use App\Services\CarMakeService;
use App\Services\CarService;
use App\Services\HomepageBannerService;
use App\Services\VideoLinkService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $carMakeService, $carService, $homeBannerService, $videoLinkService, $links;

    public function __construct(CarMakeService $carMakeService, CarService $carService, HomepageBannerService $homepageBannerService, VideoLinkService $videoLinkService)
    {
        $this->carMakeService = $carMakeService;
        $this->carService = $carService;
        $this->homeBannerService = $homepageBannerService;
        $this->videoLinkService = $videoLinkService;
        $this->links = $this->videoLinkService->get();
    }


    public function home()
    {
        $carMakes = $this->carMakeService->getHomepageCarMakes();
        $featuredCars = $this->carService->getHomepageCars();
        $banners = $this->homeBannerService->get();
        $links = $this->links;
        return view('front.pages.home', compact('carMakes', 'featuredCars', 'banners', 'links'));
    }

    public function cars(Request $request)
    {
        $cars = $this->carService->listCars($request->all());
        $carMakes = $this->carMakeService->getActivated();
        $priceRange = $this->carService->getPriceRange();
        $links = $this->links;
        return view('front.pages.list_cars', compact('cars', 'carMakes', 'priceRange', 'links'));
    }

    public function showCar($carId)
    {
        $car = $this->carService->showCarById($carId);
        $links = $this->links;
        return view('front.pages.car_details', compact('car', 'links'));
    }

    public function about()
    {
        $links = $this->links;
        return view('front.pages.about',compact('links'));
    }

    public function getInTouch(Request $request)
    {
        try {
            \Mail::to('mohamdfawaz93@gmail.com')->send(new GetInTouchMail($request->all()));
            return response()->json(['message' => trans('web.footer.visit_showroom.success_message')]);
        } catch (\Exception $e) {
            reportException($e);
            return response()->json(['message' => trans('web.footer.visit_showroom.error_message')], 400);
        }
    }
}
