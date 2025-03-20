<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Review;


class Product extends Model
{
    protected $fillable =[
        'name',
        'price',
        'description',
        'image',
        'stock',
        'category_id'
    ];
    protected $appends= ['image_path'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImagePathAttribute()
    {
        if($this->image == null){
            return null;
        }
        return asset('storage/products/'.$this->image);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
