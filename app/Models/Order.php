<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'payMethod', 'date', 'place_id',  
    ];

    public function place(){
      return $this->belongsTo(Place::class);
    }
}
