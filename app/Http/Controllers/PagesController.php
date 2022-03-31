<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $query = Post::published();

        if(request('month')):
            $query->whereMonth('published_at', request('month'));
        endif;

        if(request('year')):
            $query->whereYear('published_at', request('year'));
        endif;

        $posts = $query->paginate();

        return view('pages.home', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        //Agrupar posts por año / mes
        $archive = Post::byYearAndMonth();
        $authors = User::latest()->take(4)->get();
        $categories = Category::take(7)->get();
        $posts = Post::latest('published_at')->take(5)->get();
        return view('pages.archive', compact('authors', 'categories', 'posts', 'archive'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
