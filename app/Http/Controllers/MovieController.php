<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Tampilkan halaman utama dengan daftar film
    public function homepage()
    {
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }

    // Tampilkan detail film berdasarkan ID dan slug
    public function detail($id, $slug)
    {
        $movie = Movie::find($id);
        return view('detailmovie', compact('movie'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create_movie', compact('categories'));
    }

    // Simpan data film baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1950|max:' . date('Y'),
            'actors' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,webp'
        ]);

        // Buat slug dari judul
        $slug = Str::slug($request->title);

        // Simpan file cover image jika ada
        $cover = null;
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        // Simpan ke database
        Movie::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'synopsis' => $validated['synopsis'],
            'category_id' => $validated['category_id'],
            'year' => $validated['year'],
            'actors' => $validated['actors'],
            'cover_image' => $cover
        ]);

        return redirect('/')->with('success', 'Movie saved successfully');
    }
}
