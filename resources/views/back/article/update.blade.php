@extends('back.layout.tamplate')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('title','Update Article Admin')

@section('content')
  
    <!-- Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Article</h1>
     
      </div>

      <div class="mt-3">
        

        <div class="my-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

       <form action="{{ url('article/'.$article->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImg" value="{{ $article->image }}">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $item )
                            @if ($item->id == $article->category_id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>               
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                             @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="full-text">Deskripsi</label>
                <textarea name="full_text" id="full-text" cols="30" rows="5" class="form-control">{{ old('full_text',$article->full_text) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image">Gambar (Max 2MB)</label>
                <input type="file" name="image" id="image" class="form-control">
                <small class="mt-2">Gambar Lama</small>
                <div class="mt-1">
                    <img src="{{ asset('storage/back/'.$article->image ) }}" width="150px" alt="gambar">
                </div>
            </div>

            <div class="mb-3">
                <label for="user_id">Pilih Nama Anda</label>
                <select name="user_id" id="user_id" class="form-control">
                       <option value="" hidden>Choose</option>
                            @foreach ($user as $item )
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{ $article->status == 1 ? 'selected' : null }}>Private</option>
                            <option value="1" {{ $article->status == 0 ? 'selected' : null }}>Publish</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="publish_date">Tanggal Publikasi</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ old('publish_date', $article->publish_date) }}">
                    </div>
                </div>
            </div>

            <div class="float-end ms-2">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
       </form>
        <div class="float-end">
        <a href="{{ url('article') }}"  class="btn btn-secondary mb-2" >Back</a>
        </div>
      </div>
    </main>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#dataTable');
    </script>
@endpush