<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories;
use App\Http\Resources\CategoriesCollection;
use App\Http\Resources\ProductStorageCollection;
use App\Http\Resources\ProductStorageResource;
use App\Repositories\ProductRepository;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;
use App\Http\Resources\Categories as CategoriesResource;
use App\Category;
use App\Product;
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
     *  order by 買過的次數
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $product = Product::with('coupons')->get();
//        return ProductResource::collection($product);

        $take = $request->pageSize;
        $product = $take
            ?ProductResource::collection(Product::take($take)->get())
            :ProductResource::collection(Product::all());

        return response()->json($product);

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
            :$this->repository->queryCountOrderDetails(count($getAll));

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