<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content'
    ];

    public function order(){
        return $this->belongsToMany(Order::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
