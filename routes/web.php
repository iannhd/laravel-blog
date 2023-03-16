<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [BlogController::class, 'index'])->name('blog');
Route::get('/posts/{slug}', [BlogController::class, 'blog_content'])->name('blog.content');
Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
    Route::get('/post-deleted', [PostController::class, 'trashedPost'])->name('deletedpost');
    Route::delete('/post-kill/{id}', [PostController::class, 'kill'])->name('post.kill');
    Route::get('/post/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
    Route::resource('user', UserController::class);
});



