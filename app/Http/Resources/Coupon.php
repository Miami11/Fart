<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Coupon extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 從別的new Coupon 不能夠改變 return parent::toArray($request) ?
        return parent::toArray($request);
//        return [
//            'id' => $this->id,
//            'name'=> $this->name,
//            'description' => $this->description
//        ];
    }
}
