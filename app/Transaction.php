<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = [
      'showroom_id',
      'customer_id',
      'operator_id',
      'description',
      'total',
      'updated_at',
      'created_at',
    ];

    public function details()
    {
      return $this->hasMany(TransactionDetail::class);
    }

    public function customer()
    {
      return $this->belongsTo(User::class);
    }

    public function operator()
    {
      return $this->belongsTo(User::class);
    }
}
