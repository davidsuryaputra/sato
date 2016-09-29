<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = "item_categories";
    protected $fillable = [
      'name',
    ];

    public function materials()
    {
      return $this->hasMany(Item::class);
    }

    public function assets()
    {
      return $this->hasMany(Item::class);
    }

    public function scopeServices($query)
    {
      return $query->where('id', '!=', 1);
    }

}
