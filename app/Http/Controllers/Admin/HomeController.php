<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CarMakeService;
use App\Services\CarModelService;
use App\Services\CarService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $carMakeService, $carModelService, $carService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CarMakeService $carMakeService, CarModelService $carModelService, CarService $carService)
    {
        $this->carMakeService = $carMakeService;
        $this->carModelService = $carModelService;
        $this->carService = $carService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carMakesCount = $this->carMakeService->count();
        $carModelCount = $this->carModelService->count();
        $car_count = $this->carService->count();
        return view('admin.dashboard', ['car_make_count' => $carMakesCount, 'car_model_count' => $carModelCount, 'car_count' => $car_count]);
    }
}
