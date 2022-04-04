<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        if($post->isPublished() || auth()->check() ):

            if( request()->wantsJson() ):
                return $post;
            endif;
            
            return view('posts.show', compact('post'));

        endif;

        abort(404);


    }
}
