<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
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

    public function update(Post $post,StorePostRequest $request)
    {
        // La validacion se realiza con StorePostRequest
        
        // return Post::create($request->all());
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->iframe = $request->get('iframe');
        $post->excerpt = $request->get('excerpt');
        //acciones para la fecha a traves de un mutador
        $post->published_at = $request->get('published_at');
        //Crea categoria si es nueva o asigna y ya existe a traves de un mutador
        $post->category_id = $request->get('category_id');

        $post->save();
        //Selecciona el tag si ya existe o crea uno nuevo de no existir.
        $tags = [];

        foreach($request->get('tags') as $tag):
            $tags[] = Tag::find($tag)
                        ?   $tag
                        :   Tag::create(['name' => $tag])->id;
        endforeach;

        //Sincronizar etiquetas
        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'U post has saved');
    }

    public function store (Request $request)
    {
        $this->validate($request, [ 'title' =>  'required']);

        $post = Post::create( $request->only('title') );
        return redirect()->route('admin.posts.edit', $post );
    }

    public function edit (Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

}
