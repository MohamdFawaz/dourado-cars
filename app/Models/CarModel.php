<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'car_make_id'];

    public function carMake(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CarMake::class,'car_make_id');
    }

    public function getNameAttribute($name): string
    {
        return ucwords($name);
    }

    public function getImageAttribute($image)
    {
        return asset($image);

    }

    public function deleteImage()
    {
        if(\File::exists($this->getRawOriginal('image'))) {
            \File::delete($this->getRawOriginal('image'));
        }
    }
}
