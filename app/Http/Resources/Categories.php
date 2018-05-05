<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Categories extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
            'links' =>[
                //點到categories要進到分類項目裡
                'self' => route('category.index',['id' => $this->id]),
            ]
        ];
    }
}
