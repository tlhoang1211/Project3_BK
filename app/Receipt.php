<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function customers(){
        return $this->belongsToMany(Account::class);
    }
}
