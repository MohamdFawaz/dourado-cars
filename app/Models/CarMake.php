<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    use HasFactory;

    protected $fillable = ["name", "image", "activation"];


    public function getImageAttribute($image)
    {
        if (filter_var($image, FILTER_VALIDATE_URL)){
            return $image;
        }
        return asset($image);
    }
}
