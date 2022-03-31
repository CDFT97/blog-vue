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

        $posts = Post::published()->paginate(3);

        return view('pages.home', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        $authors = User::latest()->take(4)->get();
        $categories = Category::take(7)->get();
        $posts = Post::latest()->take(5)->get();
        return view('pages.archive', compact('authors', 'categories', 'posts'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
