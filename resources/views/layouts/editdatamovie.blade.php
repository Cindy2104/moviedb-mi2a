@extends('layouts.template')

@section('title','Edit Data Movie')
@section('navMovie','active')

@section('content')
<div class="row">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-12">
            <h1 class="h2">Edit Data Movie</h1>
            <form action="{{ route('movie.update', $movie->id) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $movie->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
                    <div class="col-sm-10">
                        <textarea name="synopsis" class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" rows="3">{{ old('synopsis', $movie->synopsis) }}</textarea>
                        @error('synopsis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="actors" class="col-sm-2 col-form-label">Actors</label>
                    <div class="col-sm-10">
                        <input type="text" name="actors" class="form-control @error('actors') is-invalid @enderror" id="actors" value="{{ old('actors', $movie->actors) }}">
                        @error('actors')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Movie</button>
                <a href="{{ route('movie.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
