<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\Product as ProductResource;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $headers = array(
            'Content-Type' => 'application/json; charset=utf-8'
        );
       $list = Category::all();

        return response()->json([$list, 200, $headers, JSON_UNESCAPED_UNICODE]);

    }

    public function categoryWithProduct(Request $request,$id)
    {
        $headers = array(
            'Content-Type' => 'application/json; charset=utf-8'
        );
        $product = Product::where('category_id',$id)->get();

        return ProductResource::collection($product);
    }
}
