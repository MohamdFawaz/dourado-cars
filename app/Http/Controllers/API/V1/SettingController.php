<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\APIController;
use App\Services\CarMakeService;
use App\Services\SettingService;

class SettingController extends APIController
{
    private $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        try {
            return $this->respondData($this->settingService->getFormatSettings());
        }catch (\Exception $exception) {
            reportException($exception);
            return $this->respondInternalError();
        }
    }
}
