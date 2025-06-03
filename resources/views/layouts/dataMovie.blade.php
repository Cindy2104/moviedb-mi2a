@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-12">

<h1 class="h2 mb-4 border-bottom pb-2">Data Movie</h1>

        <a href="/create-movie" class="btn btn-success mb-4">Input Movie</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Year</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($movies as $index => $movie)

    <tr>
      {{-- <th scope="row">1</th> --}}
      <td>{{ $index + $movies->firstItem() }}</td>
      <td>{{ $movie->title }}</td>
      <td>{{ $movie->category->category_name }}</td>
      <td>{{ $movie->year }}</td>
      <td>
        <a href="/movie/{{$movie->id}}/{{$movie->slug}}" class="btn btn-warning btn-sm">Detail</a>
        <a href="" class="btn btn-info btn-sm">Edit</a>
        {{-- @can('admin') --}}
            <a href="" class="btn btn-danger btn-sm">Hapus</a>
        {{-- @endcan --}}

      </td>


    </tr>
    @endforeach

  </tbody>
</table>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>
</div>
</div>

@endsection
