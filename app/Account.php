<?php

namespace App;

use App\Observers\AccountObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $table = 'accounts';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];

    protected static function boot()
    {
        parent::boot();
        self::observe(AccountObserver::class);
    }

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
