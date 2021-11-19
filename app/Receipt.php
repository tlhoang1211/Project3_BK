<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receipt extends Model
{

    protected $guarded = ['id'];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function orders(): HasMany
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

    public function getFormatPriceAttribute(): string
    {
        return format_money($this->total_money);

    }
}
