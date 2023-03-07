<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use stdClass;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        // dd($request->name);
        $category = new Category;
        $category->name =$request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

       return redirect()->back()->with('success', 'Kategori ' .  $category->name  . ' berhasil disimpan');

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
        // $validate = $this->validate()
        // dd($id);
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3'
        ]);
        $data=Category::findOrFail($id);
        $data->name = $request->input('name');
        $data->slug = Str::slug($request->input('name'));
        $data->save();
        return redirect()->route('category.index')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('masuk');
        $category = Category::findOrFail($id);
        // dd($category);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori ' . $category->name .' berhasil dihapus');
    }
}
