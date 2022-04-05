<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->published()->paginate(3);
        
        if( request()->wantsJson() ):
            return $posts;
        endif;
        
        return view('pages.home', [
            'title' => "Publicaciones de la etiqueta $tag->name",
            'posts' => $tag
        ] );
    }

    
}
