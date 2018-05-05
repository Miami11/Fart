<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request,$id)
    {
        $product = Product::where('category_id',$id)->get();
        return ProductResource::collection($product);
    }
}
