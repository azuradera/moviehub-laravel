<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Validation rules untuk film
     */
    private function getValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'genre' => 'required|max:100',
            'director' => 'required|max:255',
            'release_year' => 'required|digits:4|integer|min:1800|max:' . date('Y'),
            'duration' => 'required|integer|min:1|max:600',
            'rating' => 'required|numeric|min:0|max:10',
            'synopsis' => 'required|min:10',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    /**
     * Validation messages
     */
    private function getValidationMessages()
    {
        return [
            'title.required' => 'Judul film wajib diisi.',
            'title.max' => 'Judul film maksimal 255 karakter.',
            'genre.required' => 'Genre wajib diisi.',
            'genre.max' => 'Genre maksimal 100 karakter.',
            'director.required' => 'Sutradara wajib diisi.',
            'director.max' => 'Sutradara maksimal 255 karakter.',
            'release_year.required' => 'Tahun rilis wajib diisi.',
            'release_year.digits' => 'Tahun rilis harus 4 digit.',
            'release_year.min' => 'Tahun rilis tidak boleh sebelum tahun 1800.',
            'release_year.max' => 'Tahun rilis tidak boleh melebihi tahun sekarang.',
            'duration.required' => 'Durasi wajib diisi.',
            'duration.integer' => 'Durasi harus berupa angka.',
            'duration.min' => 'Durasi minimal 1 menit.',
            'rating.required' => 'Rating wajib diisi.',
            'rating.numeric' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal 0.',
            'rating.max' => 'Rating maksimal 10.',
            'synopsis.required' => 'Sinopsis wajib diisi.',
            'synopsis.min' => 'Sinopsis minimal 10 karakter.',
            'poster.image' => 'File harus berupa gambar.',
            'poster.mimes' => 'Format gambar hanya JPG, JPEG, PNG, GIF.',
            'poster.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }

    /**
     * Display a listing of films
     */
    public function index(Request $request)
    {
        $query = Film::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('genre', 'like', "%{$search}%")
                    ->orWhere('director', 'like', "%{$search}%");
            });
        }

        $films = $query->latest()->paginate(10);

        $films->appends($request->all());

        return view('film.index', compact('films'));
    }

    /**
     * Show the form for creating a new film
     */
    public function create()
    {
        return view('film.create');
    }

    /**
     * Store a newly created film in storage
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        // Handle poster upload
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('poster', 'public');
        }

        Film::create($data);

        return redirect()
            ->route('film.index')
            ->with('success', 'Film berhasil ditambahkan.');
    }

    /**
     * Display the specified film
     */
    public function show(Film $film)
    {
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified film
     */
    public function edit(Film $film)
    {
        return view('film.edit', compact('film'));
    }

    /**
     * Update the specified film in storage
     */
    public function update(Request $request, Film $film)
    {
        $data = $request->validate(
            $this->getValidationRules(),
            $this->getValidationMessages()
        );

        // Handle poster upload
        if ($request->hasFile('poster')) {
            // Delete old poster if exists
            if ($film->poster) {
                Storage::disk('public')->delete($film->poster);
            }

            // Store new poster
            $data['poster'] = $request->file('poster')->store('poster', 'public');
        }

        $film->update($data);

        return redirect()
            ->route('film.index')
            ->with('success', 'Film berhasil diperbarui.');
    }

    /**
     * Remove the specified film from storage
     */
    public function destroy(Film $film)
    {
        // Delete poster from storage
        if ($film->poster) {
            Storage::disk('public')->delete($film->poster);
        }

        $film->delete();

        return redirect()
            ->route('film.index')
            ->with('success', 'Film berhasil dihapus.');
    }
}