<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    public $timestamps = true;
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
