<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\APIController;
use App\Services\CarMakeService;

class CarMakeController extends APIController
{
    private $carMakeService;

    public function __construct(CarMakeService $carMakeService)
    {
        $this->carMakeService = $carMakeService;
    }

    public function index()
    {
        try {
            return $this->respondData($this->carMakeService->getActivated());
        }catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }
}
