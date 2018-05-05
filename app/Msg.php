<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{

    protected $fillable = ['msg'];
    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
