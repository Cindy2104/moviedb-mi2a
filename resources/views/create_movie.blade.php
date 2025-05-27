@extends('layouts.template')

@section('content')
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-lg" style="background-color: #232323;">
            <div class="card-body">
                <h1 class="mb-4 text-center" style="color:#f5c518;">Tambah Movie</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/movie" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label>
                        <textarea name="synopsis" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="year" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pemeran</label>
                        <input type="text" name="actors" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover Image (File)</label>
                        <input type="file" name="cover_image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="/" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
