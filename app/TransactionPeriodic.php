<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionPeriodic extends Model
{
    protected $table = "transaction_periodic";
    protected $fillable = [
      'name',
      'type',
    ];

    public function transactionDetail()
    {
      return $this->belongsTo(TransactionDetail::class);
    }
}
