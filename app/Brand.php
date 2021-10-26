<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function getImageSize600x600Attribute(){
        return 'https://res.cloudinary.com/vernom/image/upload/c_scale,h_600,w_600/'.$this->brand_thumbnail;
    }
}
