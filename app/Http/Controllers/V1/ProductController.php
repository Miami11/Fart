<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories;
use App\Http\Resources\CategoriesCollection;
use App\Like;
use App\Repositories\ProductRepository;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;
use App\Http\Resources\Categories as CategoriesResource;
use App\Category;
use App\Product;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(Product $product, ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *  一般列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $take = $request->pageSize;
        $user = JWTAuth::toUser($request->token);
        $products = $take ? Product::with("imgs")->has("coupons")->take($take)->get()
            : Product::with("imgs")->has("coupons")->get();
        if ($user) {
            $likes = Like::where("user_id",$user->id)->get()->pluck("product_id")->toArray();
            $list = [];

            foreach ($products as $key => $product) {
                $list[$key]["img"] = $product->imgs;
                $list[$key]["product_id"] = $product->id;
                $list[$key]["price"] = $product->price;
                $list[$key]["name"] = $product->name;
                $list[$key]["auction_off"] = $product->coupons[0]["auction_off"];
                $list[$key]["coupon_price"] = round($product->coupons[0]["auction_off"] * $product->price / 100);
                $list[$key]["like"] = in_array($product->id,$likes);
                $list[$key]["link"] = route('product.show',['product' => $product->id]);
            }
            return response()->json($list);
        }
        $list = [];
        foreach ($products as $key => $product) {
            $list[$key]["img"] = $product->imgs;
            $list[$key]["product_id"] = $product->id;
            $list[$key]["price"] = $product->price;
            $list[$key]["name"] = $product->name;
            $list[$key]["auction_off"] = $product->coupon[0]["auction_off"];
            $list[$key]["coupon_price"] = round($product->coupons[0]["auction_off"] * $product->price / 100);
            $list[$key]["link"] = route('product.show',['product' => $product->id]);

        }

        return response()->json($list);

    }

    public function categories()
    {
        return CategoriesResource::collection(Category::all());
    }

    public function getProductRank(Request $request)
    {
        $take = $request->pageSize;
        $getAll = $this->repository->getOrderDetails();
        $product = $take
            ? $this->repository->queryCountOrderDetails($take)
            : $this->repository->queryCountOrderDetails(count($getAll));

        if (count($product) <= 0) {
            $product = $this->repository->queryAllProductByTime();
        }

        return response()->json($product);
    }


    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }


}