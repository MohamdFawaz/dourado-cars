<?php

namespace App\Http\Controllers\Front;

use App\Models\CarModel;
use App\Services\CarModelService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class CarModelController extends Controller
{

    private $carModelService;

    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService = $carModelService;
    }


    public function getCarMakeModels($carMakeId)
    {
        $carMakeModels = $this->carModelService->getModelsByCarMake($carMakeId);
        return \response()->json(['data' => $carMakeModels]);
    }
}
