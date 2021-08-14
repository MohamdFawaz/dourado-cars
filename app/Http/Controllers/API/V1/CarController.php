<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\APIController;
use App\Http\Resources\CarResource;
use App\Services\CarMakeService;
use App\Services\CarService;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\assertGreaterThanOrEqual;

class CarController extends APIController
{
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
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

            return $this->respondData(CarResource::showMake($car));
        } catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }

    public function compare()
    {
        try {
            $this->carService->validateCompareRequest();
            return redirect()->to('/');
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
            $cars = [];
            return $this->respondData($cars);
        } catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }
}
