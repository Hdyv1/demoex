<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'payMethod', 'date', 'status', 
    ];

    public function place(){
      return $this->belongsTo(Place::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function comments(){
      return $this->hasMany(Comment::class);
    }
}
