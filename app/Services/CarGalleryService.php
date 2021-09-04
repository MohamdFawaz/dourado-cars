<?php

namespace App\Services;


use App\Repositories\CarGalleryRepository;

class CarGalleryService
{
    private $carGalleryRepository;

    public function __construct(CarGalleryRepository $carGalleryRepository)
    {
        $this->carGalleryRepository = $carGalleryRepository;
    }

    public function storeBulkImages($carId, $carImages)
    {
        if (isset($carImages) && count($carImages)) {
            $galleryImages = [];
            foreach ($carImages as $carImage) {
                $imageName = time() . '.' . $carImage->extension();
                $carImage->move(public_path('images/cars'), $imageName);

                $galleryImages[] = [
                    'car_id' => $carId,
                    'image' => 'images/cars/' . $imageName,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            $this->carGalleryRepository->query()->insert($galleryImages);
        }
    }

    public function deleteImage($imageId)
    {
        $this->carGalleryRepository->destroy($imageId);
    }
}
