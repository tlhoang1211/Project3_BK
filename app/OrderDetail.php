<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    public function receipt(){
        return $this->belongsTo(Receipt::class,'receipt_order','order_id','receipt_id');
    }
}
