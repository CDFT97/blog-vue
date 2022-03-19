<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create' ,compact('categories', 'tags'));
    // }

    public function update(Post $post,Request $request)
    {
        $this->validate($request, [
            'title' =>  'required',
            'excerpt' =>  'required',
            'category_id' =>  'required',
            'tags' =>  'required',
        ]);
        // return Post::create($request->all());
        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category_id');

        $post->save();

        //Asignar etiquetas
        $post->tags()->sync($request->get('tags'));
        return back()->with('flash', 'U post has saved');
    }

    public function store (Request $request)
    {
        $this->validate($request, [ 'title' =>  'required']);

        $post = Post::create([ 
            'title' => $request->get('title'),
            'url' => str_slug($request->get('title')),
        ]);
        return redirect()->route('admin.posts.edit', $post );
    }

    public function edit (Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

}
