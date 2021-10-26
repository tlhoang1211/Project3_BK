<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{


    public function receipts(){
        return $this->belongsToMany(Receipt::class,'receipt_order','order_id','receipt_id');
    }
}
