<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'type' => 'products',
            'id' => $this->id,

            'attributes' => [
                'img' => $this->imgs,
                'price' => $this->price,
                'name' => $this->name,
                'discount' => new CouponCollection($this->coupons)
//                'discount' => Coupon::collection($this->coupons)
            ],

            'links' => [
                'self' => route('product.show', ['product' => $this->id]),
            ]
        ];
//        return [
//            'category' => Categories::collection($this->whenLoaded('categories')),
//            'price' => $this->price,
//            'name' => $this->name,
//            'created_at' => optional($this->created_at)->toDateTimeString(),
//        ];
    }
//    public function with() {
//        return [
//        'sa' => 'bb'
////            'coupon' =>  Coupon::collection($this->coupons),
//        ];
//    }
}
