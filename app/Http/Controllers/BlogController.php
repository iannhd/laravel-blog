<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index(Posts $posts)
    {
        $data = $posts->orderBy('created_at', 'desc')->take(5)->get();
        $tag = Tags::all();
        $post = $posts->all();
        // dd($post);
        return view('welcome', compact('data', 'post', 'tag'));
    }

    public function blog_content($slug)
    {
        $data = Posts::where('slug', $slug)->get();

        return view('blog-content', compact('data'));
    }
}
