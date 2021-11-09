<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getGeneralDetailAttribute(): string
    {
        $general_detail = '';
        foreach ($this->orders as $order)
        {
            $general_detail .= "- {$order->product->name} ({$order->volume}) x{$order->quantity}<br>";
        }
        return $general_detail;
    }

    public function getFormatPriceAttribute()
    {
        $formatPrice = number_format($this->total_money, '0', '3', '.') . ' ₫';
        return $formatPrice;
    }
}
