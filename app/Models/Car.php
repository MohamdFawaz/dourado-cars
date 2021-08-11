<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    protected $fillable = ['kilometers', 'year', 'price', 'activation', 'warranty', 'featured', 'image', 'color',
        'number_of_doors', 'number_of_cylinders', 'hours_power', 'car_make_id', 'car_model_id'];
    public $translatedAttributes = ['name', 'title', 'specs', 'transmission_type', 'body_type', 'fuel_type', 'additional_information'];


    public function getImageAttribute($image)
    {

        return asset($image);
    }

    public function carMake()
    {
        return $this->belongsTo(CarMake::class, 'car_make_id');
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function gallery()
    {
        return $this->hasMany(CarGallery::class, 'car_id');
    }
}
