<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getFormatPriceAttribute()
    {
        $formatPrice = number_format($this->price, '0', '3', '.') . ' ₫';
        return $formatPrice;
    }
//
//    public function getProductAttribute()
//    {
//        $product = App\Product::find($this->product_id);
//    }
}
