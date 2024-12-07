@extends('back.layout.tamplate')


@section('title','Detail Article Admin')

@section('content')
  
    <!-- Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Article</h1>
     
      </div>

      <div class="mt-3">
       


        <table class="table table-striped table-bordered">
            <tr>
                <th>Title</th>
                <td>{{ $article->title }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $article->Category->name }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $article->full_text }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img src="{{ asset('storage/back/'.$article->image ) }}" width="50%" alt="gambar">
                </td>
            </tr>
            <tr>
                <th>Pengunjung</th>
                <td>{{ $article->views }}x</td>
            </tr>
            <tr>
                <th>Status</th>
                @if ($article->status == 1)
                    <td>: <span class="badge bg-success">Published</span></td>
                @else
                    <td>: <span class="badge bg-danger">Private</span></td>                    
                @endif
            </tr>
            <tr>
                <th>Tanggal Publikasi</th>
                <td>{{ $article->publish_date }}</td>
            </tr>
        </table>

        <div class="float-end mb-3">
            <a href="{{ url('article') }}"  class="btn btn-secondary " >Back</a>
        </div>
      </div>
    </main>
@endsection