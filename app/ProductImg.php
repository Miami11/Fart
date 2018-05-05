<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $fillable = ['img_id','product_id'];
}