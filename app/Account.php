<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = ['name'];

    public $timestamps = true;

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
//        return $this->belongsToMany('App\Role','account_role', 'role_id', 'account_id');
    }
    public function city(){
//        return $this->hasOne()
        return $this->belongsTo(City::class);
    }

}
