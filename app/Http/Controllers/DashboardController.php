<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Total count dari semua film
        $totalFilm = Film::count();

        // Total count dari semua user
        $totalUser = User::count();

        // Rata-rata rating dari semua film
        $averageRating = Film::avg('rating');
        $averageRating = $averageRating ? round($averageRating, 1) : 0;

        // Film dengan rating tertinggi
        $topFilm = Film::orderByDesc('rating')
            ->first();

        // 5 Film terbaru
        $recentFilms = Film::select([
                'id',
                'title',
                'genre',
                'director',
                'release_year',
                'rating'
            ])
            ->latest('created_at')
            ->limit(5)
            ->get();

        // Statistik jumlah film per genre (sorted by total)
        $genreStats = Film::select(
                'genre',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('genre')
            ->orderByDesc('total')
            ->get();

        return view('dashboard.index', compact(
            'totalFilm',
            'totalUser',
            'averageRating',
            'topFilm',
            'recentFilms',
            'genreStats'
        ));
    }
}