<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(){
        return view('back.tags.index',[
            'tags'=>Tag::get()
        ]);
    }

    public function store(TagsRequest $request)
    {
        $data = $request->validate([
            'name'=>'required'
        ],[
            'name'=>'Nama Tidak Boleh Kosong'
        ]);

        Tag::create($data);
        return back()->with('success','Tags Baru Telah Ditambahkan');
    }

    public function update(TagsRequest $request,$id)
    {
        $data = $request->validate([
            'name'=>'required'
        ],[
            'name'=>'Nama Tidak Boleh Kosong'
        ]);

        Tag::find($id)->update($data);
        return back()->with('success','Data Tag Baru Telah Di Update');
    }

    public function destroy(string $id)
    {
        Tag::find($id)->delete();
        return back()->with('hapus','Data Tag Telah Berhasil Di Hapus');
    }
}
