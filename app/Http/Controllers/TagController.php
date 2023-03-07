<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tags::paginate(10);
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20'
        ]);

        // dd($request->name);
        $tag = new Tags;
        $tag->name =$request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();

       return redirect()->back()->with('success', 'Tag ' .  $tag->name  . ' berhasil disimpan');
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
        $tag = Tags::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required|max:20'
        ]);
        $data=Tags::findOrFail($id);
        $data->name = $request->input('name');
        $data->slug = Str::slug($request->input('name'));
        $data->save();
        return redirect()->route('tag.index')->with('success', 'Tag berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tags::findOrFail($id);
        $tag->delete();
        return redirect()->back()->with('success', 'Tag ' .  $tag->name  . ' berhasil dihapus');
    }
}
