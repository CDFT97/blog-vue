<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->published()->paginate();
        
        if( request()->wantsJson() ):
            return $posts;
        endif;

        return view('pages.home', [
            'title' => "$category->name publications",
            'posts' => $posts
        ]);
    }
}
