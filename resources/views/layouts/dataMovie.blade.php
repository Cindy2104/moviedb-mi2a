@extends('layouts.template')
@section('title','Data Movie')
@section('navMovie','active')

@section('content')
<h1>Daftar Movie :</h1>
<a href="/movie/create" ></a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Category</th>
        <th>Actors</th>
        <th>Aksi</th>
    </tr>

    @foreach ($movies as $movie)
<tr>
    <td>{{ $movies->firstItem() + $loop->index }}</td>
    <td>{{ $movie->title }}</td>
    <td>{{ $movie->category->category_name }}</td>
    <td>{{ $movie->actors }}</td>
    <td>
        <a href="{{ route('movie.detail', ['id' => $movie->id, 'slug' => Str::slug($movie->title)]) }}" class="btn btn-info btn-sm">Show</a>
        <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
{{ $movies->links() }}

@endsection
