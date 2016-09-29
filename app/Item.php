<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function scopeServices($query)
    {
      return $query->whereNotIn('item_category_id', [1]);
    }

    public function scopeStockable($query)
    {
      return $query->where('stockable', 1);
    }

    public function scopeAssets($query)
    {
      return $query->where('item_category_id', 1);
    }

    public function scopeCurrentShowroom($query)
    {
      return $query->where('showroom_id', Auth::user()->showroom_id);
    }

    public function scopeItemId($query, $id)
    {
      return $query->where('id', $id);
    }
}
