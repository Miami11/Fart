<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id','product_storage_id','number','price'];

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }

}
