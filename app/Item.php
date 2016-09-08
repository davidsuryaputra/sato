<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
      'showroom_id',
      'item_category_id',
      'name',
      'value',
      'stock',
      // 'transaction_category',
    ];

    public function item_category(){
      return $this->belongsTo(ItemCategory::Class);
    }

    public function transactionDetails()
    {
      return $this->hasMany(TransactionDetail::class);
    }

    public function queues()
    {
      return $this->hasMany(Queue::class);
    }
}
