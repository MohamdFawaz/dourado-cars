<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLink extends Model
{
    use HasFactory;

    protected $fillable = ['link'];

    public function setLinkAttribute($link)
    {
        parse_str( parse_url( $link, PHP_URL_QUERY ), $vars );

        $this->attributes['link'] = $vars['v'];
    }
}
