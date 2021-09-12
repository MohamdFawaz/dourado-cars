<?php

namespace App\Services;


use App\Repositories\SettingRepository;

class SettingService
{
    private $settingRepository;
    public static $listCarCoverKey = 'List Cars Page Cover Image';
    public static $aboutCoverKey = 'About Us Page Cover Image';
    public static $contactCoverKey = 'Contact Us Page Cover Image';
    public static $compareCoverKey = 'Compare Page Cover Image';

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function find($id)
    {
        return $this->settingRepository->find($id);
    }

    public function get()
    {
        return $this->settingRepository->query()->get();
    }

    public function getFormatSettings()
    {
        $data = [];
        $settings = $this->settingRepository->query()->where('type','mobile')->get()->toArray();
        foreach ($settings as $setting) {
            if ($setting['key'] == 'address') {
                $location = json_decode($setting['value']);
                $data['location']['address'] = $location->address;
                $data['location']['lat'] = $location->lat;
                $data['location']['lng'] = $location->lng;
            }else{
                $data[$setting['key']] = $setting['value'];
            }
        }
        return $data;
    }

    public function updateForWeb($updatedSetting, $setting)
    {
        $imageName = '';
        if ($updatedSetting->image) {
            $imageName = time() . '.' . $updatedSetting->image->extension();
            $updatedSetting->image->move(public_path('images/settings'), $imageName);
        }

        $setting->value = $imageName;
        $setting->save();

    }

    public function updateForMobile($updatedSetting, $setting)
    {
        $setting->value = $updatedSetting->value;
        $setting->type = 'mobile';
        $setting->save();

    }

    public function getValueByKey($key)
    {
        return $this->settingRepository->query()->where('key', $key)->first()->value;
    }

    public function getImageValues($key)
    {
        $value = $this->getValueByKey($key);
        if ($value) {
            return asset('images/settings/' . $this->getValueByKey($key));
        }
    }

}
