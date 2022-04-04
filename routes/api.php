<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PagesController::class, 'home']);
Route::get('blog/{post}', [PostsController::class, 'show']);
//categorias
Route::get('categories/{category}', [CategoriesController::class, 'show']);
//etiquetas
Route::get('tags/{tag}', [TagsController::class, 'show']);
