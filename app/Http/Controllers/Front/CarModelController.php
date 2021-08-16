<?php

namespace App\Http\Controllers\Front;

use App\Http\Resources\YearResource;
use App\Models\CarModel;
use App\Services\CarModelService;
use App\Services\CarService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class CarModelController extends Controller
{

    private $carModelService, $carService;

    public function __construct(CarModelService $carModelService, CarService $carService)
    {
        $this->carModelService = $carModelService;
        $this->carService = $carService;
    }


    public function getCarMakeModels($carMakeId)
    {
        $carMakeModels = $this->carModelService->getModelsByCarMake($carMakeId);
        return \response()->json(['data' => $carMakeModels]);
    }

    public function getCarModelYears($carModelId)
    {
        $carModelYears = $this->carService->getCarModelYears($carModelId);
        return \response()->json(['data' => YearResource::collection($carModelYears)]);
    }
}
