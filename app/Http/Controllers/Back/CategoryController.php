<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.category.index',[
            'categories' => Category::latest()->get()
        ]);


    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ], [
            'required' => 'Nama Category Tidak Boleh Kosong'
        ]);
        
        $slug = Str::slug($data['name']);
        
        Category::create([
            'name' => $data['name'],  
            'slug' => $slug          
        ]);        

        return back()->with('success','Categori Baru Telah Ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ], [
            'required' => 'Nama Category Tidak Boleh Kosong'
        ]);
        
        $slug = Str::slug($data['name']);
        
        Category::find($id)->update([
            'name' => $data['name'],  
            'slug' => $slug          
        ]);        

        return back()->with('success','Categori Telah Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return back()->with('hapus','Categori Telah Berhasil Di Hapus');
    }
}
