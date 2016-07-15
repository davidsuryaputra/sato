<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = "pricings";
    protected $fillable = [
      'showroom_id',
      'name',
      'value',
    ];

    public function showroom()
    {
      return $this->belongsTo(Showroom::class);
    }

    public function transactionDetail()
    {
      return $this->belongsTo(TransactionDetail::class);
    }

}
