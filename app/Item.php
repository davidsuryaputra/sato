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
      'stocks',
      'transaction_category',
    ];

    public function item_category(){
      return $this->belongsTo(ItemCategory::Class);
    }
}
