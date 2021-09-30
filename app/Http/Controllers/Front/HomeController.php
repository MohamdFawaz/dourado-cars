<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Http\Requests\SellCarRequest;
use App\Mail\GetInTouchMail;
use App\Mail\SellCarMail;
use App\Services\CarMakeService;
use App\Services\CarService;
use App\Services\HomepageBannerService;
use App\Services\PanoramicCarService;
use App\Services\SettingService;
use App\Services\VideoLinkService;
use Illuminate\Http\Request;
use KgBot\LaravelLocalization\Facades\ExportLocalizations as ExportLocalization;

class HomeController extends Controller
{

    private $carMakeService, $carService, $homeBannerService, $videoLinkService, $settingService, $panoramicCarService, $links;

    public function __construct(CarMakeService $carMakeService,
                                CarService $carService,
                                HomepageBannerService $homepageBannerService,
                                VideoLinkService $videoLinkService,
                                SettingService $settingService,
                                PanoramicCarService $panoramicCarService)
    {
        $this->carMakeService = $carMakeService;
        $this->carService = $carService;
        $this->homeBannerService = $homepageBannerService;
        $this->videoLinkService = $videoLinkService;
        $this->settingService = $settingService;
        $this->panoramicCarService = $panoramicCarService;
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
        $coverImage = $this->settingService->getImageValues(SettingService::$listCarCoverKey);
        return view('front.pages.list_cars', compact('cars', 'carMakes', 'priceRange', 'links', 'coverImage'));
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
        $coverImage = $this->settingService->getImageValues(SettingService::$aboutCoverKey);
        return view('front.pages.about',compact('links','coverImage'));
    }

    public function getInTouch(Request $request)
    {
        try {
            \Mail::to(config('mail.to.address'))->send(new GetInTouchMail($request->all()));
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
        $coverImage = $this->settingService->getImageValues(SettingService::$compareCoverKey);
        return view('front.pages.compare', compact('links', 'cars', 'coverImage'));
    }

    public function contactUs()
    {
        $links = $this->links;
        $coverImage = $this->settingService->getImageValues(SettingService::$contactCoverKey);
        return view('front.pages.contact', compact('links', 'coverImage'));
    }

    public function showGetInTouch($id)
    {
        $car = $this->carService->findById($id);
        if (!$car) {
            abort(404);
        }
        return view('front.pages.get_in_touch', compact('car'));
    }

    public function getCarConditionOptions()
    {
        $conditions = [trans('web.sell_a_car.condition_options.extra_clean'),trans('web.sell_a_car.condition_options.clean'),trans('web.sell_a_car.condition_options.average'),trans('web.sell_a_car.condition_options.below_average'),trans('web.sell_a_car.condition_options.i_dont_know')];
        $accidentOptions = [trans('web.sell_a_car.accident_options.yes'),trans('web.sell_a_car.accident_options.no'),trans('web.sell_a_car.accident_options.i_dont_know')];
        return response()->json(compact('conditions','accidentOptions'));
    }

    public function submitSellCar(SellCarRequest $request)
    {
        try {
            \Mail::to(config('mail.to.address'))->send(new SellCarMail($request->all()));
            return response()->json(['message' => trans('web.sell_a_car.success_message')]);
        } catch (\Exception $e) {
            reportException($e);
            return response()->json(['message' => trans('web.sell_a_car.failed_message')], 400);
        }
    }

    public function getPanoramicCars()
    {
        $links = $this->links;
        $cars = $this->panoramicCarService->get();
        return view('front.pages.list_panoramic_cars', compact('links', 'cars'));
    }

    public function showPanoramicCar($id)
    {
        $links = $this->links;
        $car = $this->panoramicCarService->findById($id);
        return view('front.pages.show_panoramic_car', compact('links', 'car'));
    }

    public function setCurrentLocale($locale)
    {
        \Session::put('locale', $locale);
        return redirect()->back();
    }

    public function formatCarsData()
    {
        $this->carService->formatData();
    }
}
