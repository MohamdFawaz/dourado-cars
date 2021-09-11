<?php

namespace App\Repositories;


use App\Models\HomepageBanner;

class HomepageBannerRepository extends Repository
{
    protected $model;

    /**
     * HomepageBannerRepository constructor.
     * @param HomepageBanner $model
     */
    public function __construct(HomepageBanner $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function store($newBanner)
    {
        $banner = new $this->model;

        $imageName = '';

        if ($newBanner->image) {
            $imageName = time() . '.' . $newBanner->image->extension();
            $newBanner->image->move(public_path('images/banners'), $imageName);
        }

        $banner->image = 'images/banners/' . $imageName;

        foreach ($newBanner->title as $locale => $value) {
            $banner->translateOrNew($locale)->title = $value;
        }

        $banner->save();
        return $newBanner;
    }

    public function update($updatedBanner, $id)
    {
        $banner = $this->model::query()->find($id);


        if ($updatedBanner->image) {
            $imageName = time() . '.' . $updatedBanner->image->extension();
            $updatedBanner->image->move(public_path('images/banners'), $imageName);
            $banner->image = 'images/banners/' . $imageName;
        }


        foreach ($updatedBanner->title as $locale => $value) {
            $banner->translateOrNew($locale)->title = $value;
        }

        $banner->save();
        return $updatedBanner;
    }

    public function destroy($id)
    {
        $banner = $this->find($id);
        if ($banner->delete()) {
            $banner->deleteImage();
        }
    }

}
