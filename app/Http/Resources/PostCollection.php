<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
               'summary'=> $this->summary,
            ],
            'relationships' => new PostRelationshipResource($this),
            'links' => [
                'self' => route('posts.show', ['post' => $this->id]),
            ]
        ];
    }
}
