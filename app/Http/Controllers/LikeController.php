<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke(Request $request) {

       $user = JWTAuth::toUser($request->token);

        $product = Product::find($request->input('product_id'));
        $user->likes()->toggle($product);
        //? 頁面顯示user點選了幾ㄍ
        return response([
            'status' => 'success',
//            'data' => $product
        ]);
    }
}
