<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable implements CanResetPassword
{
    use Notifiable;

    protected $table = 'accounts';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function city(): BelongsTo
    {
        //        return $this->hasOne()
        return $this->belongsTo(City::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class)->latest();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function orders(): HasMany
    {
        return $this->hasMany(OrderDetail::class)->latest();
    }
}
