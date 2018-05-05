<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke(Request $request) {
        $user = User::find(Auth::user()->id());
        $article = Post::find($request->input('post_id'));
        $user->likes()->toggle($article);

        return back();
    }
}
