<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','summary','content','is_public'];
    /**
     * Get the comments for the blog post.
     */
    public function msgs()
    {
        return $this->hasMany('App\Msg');
    }

    public function imgs()
    {
        return $this->belongsToMany('App\Img');
    }
}
