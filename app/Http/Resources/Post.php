<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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

            'type' => 'articles',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'img' => (new PostImgsRelationshipResource($this->imgs))->additional(['post' => $this]),
                'summary' => $this->summary,
            ],
            //點進去後才有留言
//            'relationships' => new PostRelationshipResource($this),
            'links' => [
                'self' => route('posts.show', ['post' => $this->id]),
            ]
        ];
    }
    //add meta data to our resources
//    public function with($request)
//    {
//        return [
//            'links' => [
//                'self' => route('articles.index'),
//            ],
//        ];
//    }
}
