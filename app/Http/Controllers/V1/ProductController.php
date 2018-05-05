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
        // request 近來幾筆
//        dd(Product::with('coupons')->get());
        return ProductResource::collection(Product::all());
//        dd(Categories::collection(Product::find(1)));
//        return ProductResource::collection(Product::all());
    }

    public function categories()
    {
        return CategoriesResource::collection(Category::all());

    }

    public function getProductRank(Request $request)
    {
        $take = $request->pageSiz;
        $getAll = $this->repository->getOrderDetails();
        $product = $take
            ? $this->repository->queryCountOrderDetails($take)
            :$this->repository->queryCountOrderDetails(count($getAll));

        if (count($product) <= 0) {
            $product = $this->repository->queryAllProductByTime();
        }

        return response()->json($product);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

}