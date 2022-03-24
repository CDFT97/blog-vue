<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {

        $posts = Post::published()->paginate(3);

        return view('welcome', compact('posts'));
    }
}
