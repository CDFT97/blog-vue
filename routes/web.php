<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
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

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('posts', PostsController::class, ['except' => 'show', 'as' => 'admin'] );
    Route::resource('users', UsersController::class, ['as' => 'admin'] );
   
    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');
    //Eliminar fotos
    Route::delete('photos/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');

});

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
