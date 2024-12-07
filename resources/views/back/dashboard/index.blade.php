@extends('back.layout.tamplate')

@section('title','Dashboard Admin')

@section('content')
  
    <!-- Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="card text-bg-primary mb-3" style="max-width: 100%;">
            <div class="card-header">Total Article</div>
            <div class="card-body">
              <h5 class="card-title">{{ $total_articles }} Articles</h5>
              <p class="card-text">
                <a href="{{ url('article') }}" class="text-white">Views</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card text-bg-secondary mb-3" style="max-width: 100%;">
            <div class="card-header">Total Categories</div>
            <div class="card-body">
              <h5 class="card-title">{{ $total_categories }} Categories</h5>
              <p class="card-text">
                <a href="{{ url('categories') }}" class="text-white">Views</a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <h4>Latest Artikel</h4>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>Title</th>
                <th>Categories</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($latest_article as $item )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td>{{ $item -> created_at }}</td>
                  <td>
                    <a href="{{ url('article/' .$item->id ) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="col-6">
          <h4>Popular Artikel</h4>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>Title</th>
                <th>Categories</th>
                <th>View</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($popular_article as $item )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td>{{ $item -> views }}</td>
                  <td>
                    <a href="{{ url('article/' .$item->id ) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
@endsection