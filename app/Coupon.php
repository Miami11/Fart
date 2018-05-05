<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['name','description','started_at','ended_at','auction_off'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
