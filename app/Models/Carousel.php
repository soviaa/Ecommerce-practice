<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable=[
        'title',
        'image'
    ];

    protected $appends= ['image_path'];

    public function getImagePathAttribute()
    {
        if($this->image == null){
            return null;
        }
        return asset('storage/carousels/'.$this->image);
    }
}
