<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $post = Posts::paginate(5);
        $tag = Tags::paginate(10);
        $category = Category::all();

        // dd($post);        

        return view('welcome', compact('post', 'tag', 'category'));
    }
}
