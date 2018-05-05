<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStorage extends Model
{
    protected $fillable = ['number','size'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
