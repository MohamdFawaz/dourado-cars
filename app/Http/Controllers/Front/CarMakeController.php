<?php

namespace App\Http\Controllers\Front;

use App\Http\Resources\YearResource;
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

    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


    public function getCarMakeYears($carMakeId)
    {
        $carMakeYears = $this->carService->getCarMakeYears($carMakeId);
        return \response()->json(['data' => YearResource::collection($carMakeYears)]);
    }
}
