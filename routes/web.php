<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController as ControllersPostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PagesController::class, 'index']);
//Posts 
Route::get('blog/{post}', [ControllersPostsController::class, 'show']);





Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    //Rutas de administración - admin routes 
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('posts/create', [PostsController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}', [PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [PostsController::class, 'update'])->name('admin.posts.update');

    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');

});

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
