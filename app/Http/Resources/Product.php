    /**
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
     * Transform the resource into an array.
     *
     * @return array
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
