<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmApiController extends Controller
{
    public function index()
    {
        return response()->json(Film::all());
    }

    public function show(Film $film)
    {
        return response()->json($film);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'genre'=>'required',
            'director'=>'required',
            'release_year'=>'required|integer',
            'duration'=>'required|integer',
            'rating'=>'required|numeric',
            'synopsis'=>'required',
        ]);

        $film = Film::create($data);

        return response()->json($film,201);
    }

    public function update(Request $request, Film $film)
    {
        $film->update($request->all());

        return response()->json($film);
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json([
            'message'=>'Film berhasil dihapus'
        ]);
    }
}