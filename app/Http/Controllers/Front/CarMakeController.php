<?php

namespace App\Http\Controllers\Front;

use App\Http\Resources\YearResource;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Services\CarMakeService;
use App\Services\CarModelService;
use App\Services\CarService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class CarMakeController extends Controller
{

    private $service,$carService;

    public function __construct(CarService $carService, CarMakeService $service)
    {
        $this->carService = $carService;
        $this->service = $service;
    }


    public function getCarMakeYears($carMakeId)
    {
        $carMakeYears = $this->carService->getCarMakeYears($carMakeId);
        return \response()->json(['data' => YearResource::collection($carMakeYears)]);
    }

    public function getCarMakes()
    {
        $makes = $this->service->get();
        return \response()->json($makes);
    }
}
