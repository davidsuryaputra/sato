<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $table = 'queues';
    protected $fillable = [
      'customer_id',
      'showroom_id',
      'jenis',
      'no_kendaraan',
      'status',
    ];

    public function customer(){
      return $this->belongsTo(User::class);
    }

    public function item(){
      return $this->belongsTo(Item::class);
    }
}
