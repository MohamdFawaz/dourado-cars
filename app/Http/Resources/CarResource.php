<?php

namespace App\Http\Resources;

use App\Models\CarGallery;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->name,
            'mileage' => $this->kilometers,
            'year' => $this->year,
            'car_make' => $this->carMake,
            'body_type' => $this->body_type,
            'price' => $this->price ." " . trans('web.currency_name'),
            'number_of_cylinder' => $this->number_of_cylinders . " " . trans('web.cylinders'),
        ];
    }

    public static function showMake($request)
    {
        $data = (new CarResource($request))->toArray($request);
        $data['color'] = $request->color;
        $data['specs'] = $request->specs;
        $data['number_of_cylinder'] = $request->number_of_cylinders;
        $data['warranty'] = (bool)($request->warranty);
        $data['transmission_type'] = $request->transmission_type;
        $data['fuel_type'] = $request->fuel_type;
        $data['hours_power'] = $request->hours_power;
        $request->gallery->prepend(self::createImageInstance($request));
        $data['images'] = CarGalleryResource::collection($request->gallery);
        return $data;

    }

    private static function createImageInstance($request)
    {
        return (new CarGallery(['image' => $request->image]));
    }
}
