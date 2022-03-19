<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {

        $posts = Post::published()->get();

        return view('welcome', compact('posts'));
    }
}
