<?php

namespace App\Services;


use App\Repositories\SettingRepository;

class SettingService
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getFormatSettings()
    {
        return $this->settingRepository->query()->select('key','value')->get();
    }

}
