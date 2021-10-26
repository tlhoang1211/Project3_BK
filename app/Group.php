<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function products(){
        $this->belongsToMany(Product::class);
    }
}
