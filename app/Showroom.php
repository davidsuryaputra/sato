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
}
