<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostRelationshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //近來後的文章內容＆圖片＆留言
        return [
            'comments' => (new PostMsgsRelationshipResource($this->comments))->additional(['article' => $this]),
        ];
    }
}
