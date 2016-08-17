<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'item_id',
        'quantity',
        'description',
        'sub_total',
    ];

    public function transaction()
    {
      return $this->belongsTo(Transaction::class);
    }

    public function category(){
      return $this->hasOne(TransactionCategory::class);
    }

    public function item()
    {
      return $this->belongsTo(Item::class);
    }

    public function pricing()
    {
      return $this->hasOne(Pricing::class);
    }

    public function periodic()
    {
      return $this->hasOne(TransactionPeriodic::class);
    }
}
