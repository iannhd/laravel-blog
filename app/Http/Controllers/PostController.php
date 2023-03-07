<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required|max:2048|mimes:jpeg,png,jpg,'
        ]);

        $gambar = $request->file('gambar');
        $new_gambar = time() . $gambar->getClientOriginalName();
        // dd($new_gambar);

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/upload/posts/' .$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]); 

        $post->tags()->attach($request->tags);
        $gambar->storeAs('public/upload/posts/' . $new_gambar);
        return redirect()->back()->with('success', 'Postingan anda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tags::all();
        $category = Category::all();
        $post = Posts::findOrFail($id);
        return view('admin.post.edit', compact('post', 'tags', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

       

        $post = Posts::findOrFail($id);

        if($request->has('gambar'))
        {
            $gambar = $request->file('gambar');
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->storeAs('public/upload/posts/' . $new_gambar);
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/upload/posts/' .$new_gambar,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id()
            ];  
        } 
            else 
        {
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id()
            ];  
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);
       
        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post berhasil dihapus(silahkan cek trashed post)');
    }

    public function trashedPost()
    {
        $post = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.trashed', compact('post'));
        // return('test');
    }

    public function restore(string $id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back()->with('success', 'Post berhasil di restore (silahkan cek list post) ');
    }

    public function kill(string $id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->tags()->detach();
        $post->forceDelete();
        return redirect()->back()->with('success', 'Post berhasil di hapus permanent');

    }
}
