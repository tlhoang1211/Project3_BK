<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];

    public $timestamps = true;

    public function accounts() {
        return $this->belongsToMany(Role::class)->withTimestamps();
//        return $this->belongsToMany('App\Account', 'role_account', 'account_id', 'role_id');
    }
}
