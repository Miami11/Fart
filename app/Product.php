<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','price','name'];

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function productStorage()
    {
        return $this->belongsTo('App\ProductStorage');
    }

    public function imgs()
    {
        return $this->belongsToMany('App\Img');
    }

    public function coupons()
    {
        return $this->belongsToMany('App\Coupon');
    }
}
