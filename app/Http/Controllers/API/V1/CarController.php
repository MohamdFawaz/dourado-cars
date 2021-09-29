<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\APIController;
use App\Http\Resources\CarResource;
use App\Http\Resources\PanoramicCarResource;
use App\Services\CarService;
use App\Services\PanoramicCarService;
use Illuminate\Validation\ValidationException;

class CarController extends APIController
{
    private $carService, $panoramicCarService;

    public function __construct(CarService $carService, PanoramicCarService $panoramicCarService)
    {
        $this->carService = $carService;
        $this->panoramicCarService = $panoramicCarService;
    }

    public function index()
    {
        try {
            $cars = $this->carService->getActivatePaginated(request()->get('per_page'));
            return $this->respondWithCollectionResourcePagination(CarResource::collection($cars));
        } catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }

    public function show($id)
    {
        try {
            $car = $this->carService->findById($id, ['carMake:id,name', 'gallery']);

            if (!$car) {
                return $this->respondNotFound();
            }

            return $this->respondDataWithProperty(CarResource::showMake($car), $this->recommended($id)->original);
        } catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }

    public function compare()
    {
        try {
            $this->carService->validateCompareRequest();
            $params = $this->carService->constructCompareCarIds(request()->get('car_ids'));
            return $this->respondData(['link' => urldecode(route('compare', $params))],);
        } catch (ValidationException $exception) {
                return $this->respondValidationErrors($exception);
        } catch (\Exception $e) {
            reportException($e);
            return $this->respondInternalError();
        }
    }

    public function recommended($id)
    {
        try {
            $cars = $this->carService->getActivatePaginated(request()->get('per_page'));
            return $this->respondWithCollectionResourcePagination(CarResource::collection($cars));
        } catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }

    public function carPanoramic()
    {
        try {
            $cars = $this->panoramicCarService->get();
            return $this->respondData(PanoramicCarResource::collection($cars));
        } catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }

    public function getInTouch($carId)
    {
        try {
            return $this->respondData(['link' => route('show-get-in-touch', [$carId, 'source' => 'mobile-webview'])]);
        } catch (\Exception $e) {
            reportException($e);
            return $this->respondInternalError();
        }
    }
}
