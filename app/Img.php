<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $fillable = ['name','path'];

    public function posts()
    {
        return $this->belongsToMany('App\Img');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
