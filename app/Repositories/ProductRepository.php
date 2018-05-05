<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Product;

class ProductRepository
{
    //count product_id 出現的次數 和 count 幾次
    public function queryCountOrderDetails($take)
    {
        return DB::table('product_storages')
            ->join('order_details', 'order_details.product_storages_id','=','product_storages.id')
            ->join('products','product_storages.product_id','=','products.id')
            ->select('product_storages.product_id as id','products.*', DB::raw('count(product_storages.product_id) as buy_count') )
            ->groupBy('product_storages.product_id')
            ->orderBy('buy_count','desc')
            ->take($take)
            ->get();
    }

    public function getOrderDetails()
    {
        return DB::table('product_storages')
            ->join('order_details', 'order_details.product_storages_id','=','product_storages.id')
            ->join('products','product_storages.product_id','=','products.id')
            ->select('product_storages.product_id as id','products.*', DB::raw('count(product_storages.product_id) as buy_count') )
            ->groupBy('product_storages.product_id')
            ->orderBy('buy_count','desc')
            ->get();
    }
    public function queryAllProductByTime()
    {
        return Product::orderBy('created_at','desc')->get();
    }
}