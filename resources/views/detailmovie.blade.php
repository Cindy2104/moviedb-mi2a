@extends('layouts.template')
@section('content')

<h1>Detail</h1>
<div class="col-lg-6">
    <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $movie->title }}</h5>
              <p class="card-text">Synopsis : {{ $movie->synopsis }}</p>
              <p class="card-text">Year : {{ $movie->year }}</p>
              <p class="card-text">Category : {{ $movie->category->category_name }}</p>
              <p class="card-text">Actors : {{ $movie->actors }}</p>
              <a href="/" class="btn btn-success">Back</a>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
