<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = [
      'source_id',
      'accountant_id',
      'showroom_id',
      'type',
      'total',
    ];

    public function details()
    {
      return $this->hasMany(TransactionDetail::class);
    }
}
