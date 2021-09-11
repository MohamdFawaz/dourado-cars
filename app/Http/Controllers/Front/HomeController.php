<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Mail\GetInTouchMail;
use App\Mail\SellCarMail;
use App\Services\CarMakeService;
use App\Services\CarService;
use App\Services\HomepageBannerService;
use App\Services\VideoLinkService;
use Illuminate\Http\Request;
use KgBot\LaravelLocalization\Facades\ExportLocalizations as ExportLocalization;

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

    public function sellCar()
    {
        $messages = ExportLocalization::export()->toFlat();
        $messages = json_encode($messages);
        $links = $this->links;
        return view('front.pages.sell_car', compact('messages', 'links'));
    }

    public function compare(Request $request)
    {
        $cars = $this->carService->getForCompare($request->get('car_id') ?? []);
        $links = $this->links;
        return view('front.pages.compare', compact('links', 'cars'));
    }

    public function contactUs()
    {
        $links = $this->links;
        return view('front.pages.contact', compact('links'));
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
            \Mail::to(config('mail.to.address'))->send(new SellCarMail($request->all()));
            return response()->json(['message' => trans('web.sell_a_car.success_message')]);
        } catch (\Exception $e) {
            reportException($e);
            return response()->json(['message' => trans('web.sell_a_car.failed_message')]);
        }
    }
}
