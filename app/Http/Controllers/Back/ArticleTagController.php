<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleTagsRequest;
use App\Models\Article;
use App\Models\ArticleTags;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleTagController extends Controller
{
    public function index()
    {
        return view("back.article_tags.index",[
            'articles'=> ArticleTags::with('Tag')->with('Article')->get(),
            'RelationArticle'=> Article::get(),
            'Relationtag' => Tag::get()
        ]); 
    }

    public function create()
    {
        return view('back.article_tags.create',[
            'RelationArticle'=> Article::get(),
            'Relationtag' => Tag::get()
        ]);
    }

    public function store(ArticleTagsRequest $request){

        $data = $request->validated();
        ArticleTags::create($data);

        return redirect(url('/article_tags'))->with('success', 'Berhasil Menambahkan Article Tag ');
    }

    public function update(ArticleTagsRequest $request, string $id)
    {
        $data = $request->validated(); // Mengambil data validasi
    
        // Cari data berdasarkan ID
        $articleTag = ArticleTags::find($id);
        if (!$articleTag) {
            return redirect(url('article_tags'))->with('error', 'Article Tag tidak ditemukan!');
        }
    
        // Update data
        $articleTag->update([
            'article_id' => $data['article_id'],
            'tag_id' => $data['tag_id'],
        ]);
    
        return redirect(url('article_tags'))->with('success', 'Berhasil Mengupdate Article Tag!');
    }
    
    public function destroy(string $id)
    {
        ArticleTags::find($id)->delete();
        return back()->with('hapus','Categori Telah Berhasil Di Hapus');
    }
}
