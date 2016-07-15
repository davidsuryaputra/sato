<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    protected $table = 'transaction_categories';
    protected $fillable = [
      'name',
    ];

    public function transactionDetail()
    {
      return $this->belongsTo(TransactionDetail::class);
    }

}
