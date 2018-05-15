<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Product;

class ProductRepository
{
    //count product_id 出現的次數 和 count 幾次
    public function queryCountOrderDetails($take)
    {
        return DB::table('product_storage')
            ->join('order_detail', 'order_detail.product_storage_id','=','product_storage.id')
            ->join('products','product_storage.product_id','=','products.id')
            ->select('product_storage.product_id as id','products.*', DB::raw('count(product_storage.product_id) as buy_count') )
            ->groupBy('product_storage.product_id')
            ->orderBy('buy_count','desc')
            ->take($take)
            ->get();
    }

    public function getOrderDetails()
    {
        return DB::table('product_storage')
            ->join('order_detail', 'order_detail.product_storage_id','=','product_storage.id')
            ->join('products','product_storage.product_id','=','products.id')
            ->select('product_storage.product_id as id','products.*', DB::raw('count(product_storage.product_id) as buy_count') )
            ->groupBy('product_storage.product_id')
            ->orderBy('buy_count','desc')
            ->get();
    }
    public function queryAllProductByTime()
    {
        return Product::orderBy('created_at','desc')->get();
    }
}