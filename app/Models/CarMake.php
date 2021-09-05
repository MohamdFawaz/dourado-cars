<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarMake extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["name", "image", "activation"];


    public function scopeActivated($query)
    {
        return $query->whereActivation(true);
    }

    public function getImageAttribute($image)
    {
        if (filter_var($image, FILTER_VALIDATE_URL)){
            return $image;
        }
        return asset($image);
    }

    public function carModels()
    {
        return $this->hasMany(CarModel::class, 'car_make_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'car_make_id');
    }
}
