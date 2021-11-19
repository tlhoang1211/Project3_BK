<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = true;
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function accounts()
    {
        return $this->hasMany(Account::class);
//        return $this->belongsToMany('App\Account', 'role_account', 'account_id', 'role_id');
    }
}
