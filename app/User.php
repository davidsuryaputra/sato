<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'name', 'phone', 'address', 'city', 'role_id', 'showroom_id', 'balance', 'no_kendaraan',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
      return $this->belongsTo(Role::class);
    }

    public function showroom(){
      return $this->belongsTo(Showroom::class);
    }

    public function transactions(){
      return $this->hasMany(Transaction::class);
    }

    public function hasRole($role){
      dd($this);
    }
}
