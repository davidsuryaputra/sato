<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $table = "showrooms";

    protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'balance',
    ];

    public function users(){
      return $this->hasMany(User::class);
    }

    public function manager(){
      return $this->hasOne(User::class);
    }

    public function pricings()
    {
      return $this->hasMany(Pricing::class);
    }
}
