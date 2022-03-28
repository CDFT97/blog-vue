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
        $posts = Post::allowed()->get();

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
        $this->authorize('update', $post);
        // La validacion se realiza con StorePostRequest
        
        // return Post::create($request->all());
        // $post->title = $request->get('title');
        // $post->body = $request->get('body');
        // $post->iframe = $request->get('iframe');
        // $post->excerpt = $request->get('excerpt');
        // //acciones para la fecha a traves de un mutador
        // $post->published_at = $request->get('published_at');
        // //Crea categoria si es nueva o asigna y ya existe a traves de un mutador
        // $post->category_id = $request->get('category_id');
        // $post->save();
        //Como todos los campos de post tienen los mismos nombres que los datos del form
        $post->update($request->all());
        //Selecciona el tag si ya existe o crea uno nuevo de no existir.
        $post->syncTags($request->get('tags'));
        alert()->success('Post has been updated', 'Post updated');

        return redirect()->route('admin.posts.edit', $post);
    }

    public function store (Request $request)
    {
        $this->authorize('create', new Post);

        $this->validate($request, [ 
            'title' =>  'required'
        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'user_id' =>  auth()->id()
        ]);
        

        return redirect()->route('admin.posts.edit', $post );
    }

    public function edit (Post $post)
    {
        
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        alert()->success('Post has been deleted', 'Post deleted');

        return redirect()->route('admin.posts.index');

    }

}
