<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function customer()
    {
        return $this->belongsTo(Account::class, 'customerId');
    }

    public function orders()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
