<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController as ControllersPostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PagesController::class, 'home'])->name('pages.home');
Route::get('about', [PagesController::class, 'about'])->name('pages.about');
Route::get('archive', [PagesController::class, 'archive'])->name('pages.archive');
Route::get('contact', [PagesController::class, 'contact'])->name('pages.contact');
//Posts 
Route::get('blog/{post}', [ControllersPostsController::class, 'show'])->name('posts.show');
//categories
Route::get('categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');
//etiquetas
Route::get('tags/{tag}', [TagsController::class, 'show'])->name('tags.show');





Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    //Rutas de administración - admin routes 
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('posts/create', [PostsController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}', [PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [PostsController::class, 'update'])->name('admin.posts.update');
    Route::delete('posts/{post}', [PostsController::class, 'destroy'])->name('admin.posts.destroy');


    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');
    //Eliminar fotos
    Route::delete('photos/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');

});

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
