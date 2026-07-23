@extends('layouts.moviehub')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <div>
        <h1 class="text-4xl font-bold">
            Dashboard
        </h1>

        <p class="text-gray-300">
            Selamat datang di MovieHub.
        </p>
    </div>

    <!-- Stat Cards -->
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="glass card-hover p-6 rounded-xl">
            <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">
                Total Film
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalFilm }}
            </h2>

            <p class="text-gray-500 text-xs mt-2">
                Semua film yang terdaftar
            </p>
        </div>

        <div class="glass card-hover p-6 rounded-xl">
            <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">
                Total User
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalUser }}
            </h2>

            <p class="text-gray-500 text-xs mt-2">
                Pengguna aktif
            </p>
        </div>

        <div class="glass card-hover p-6 rounded-xl">
            <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">
                Rata-rata Rating
            </p>

            <h2 class="text-4xl font-bold mt-3 text-yellow-400">
                {{ $averageRating ?? '-' }}
            </h2>

            <p class="text-gray-500 text-xs mt-2">
                ⭐ Dari semua film
            </p>
        </div>

        <div class="glass card-hover p-6 rounded-xl">
            <p class="text-gray-400 text-sm font-semibold uppercase tracking-wider">
                Film Terbaik
            </p>

            @if($topFilm)
                <h2 class="text-2xl font-bold mt-3 line-clamp-2">
                    {{ $topFilm->title }}
                </h2>

                <p class="text-yellow-400 text-sm mt-2 font-semibold">
                    ⭐ {{ $topFilm->rating }}/10
                </p>
            @else
                <p class="text-gray-500 mt-3">
                    -
                </p>
            @endif
        </div>

    </div>

    <!-- Film Terbaru Table -->
    <div class="glass p-6 rounded-xl">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">
                Film Terbaru
            </h2>

            <a href="{{ route('film.index') }}"
                class="text-blue-400 hover:text-blue-300 text-sm font-semibold">
                Lihat Semua →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">

                <thead class="bg-white/5">

                    <tr class="border-b border-white/10">

                        <th class="text-left py-4 px-4">Judul</th>
                        <th class="text-left py-4 px-4">Genre</th>
                        <th class="text-left py-4 px-4">Sutradara</th>
                        <th class="text-left py-4 px-4">Tahun</th>
                        <th class="text-center py-4 px-4">Rating</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($recentFilms as $film)

                        <tr class="border-b border-white/5 hover:bg-white/5 transition">

                            <td class="py-4 px-4 font-semibold">{{ $film->title }}</td>

                            <td class="py-4 px-4 text-gray-400">{{ $film->genre }}</td>

                            <td class="py-4 px-4 text-gray-400">{{ $film->director }}</td>

                            <td class="py-4 px-4 text-gray-400">{{ $film->release_year }}</td>

                            <td class="py-4 px-4 text-center">
                                <span class="inline-block px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-sm font-semibold">
                                    ⭐ {{ $film->rating }}
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-8 text-center text-gray-400">

                                Belum ada data film.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

    <!-- Genre Statistics -->
    <div class="glass p-6 rounded-xl">

        <h2 class="text-2xl font-bold mb-6">
            Statistik Genre
        </h2>

        @if($genreStats->count() > 0)

            <div class="space-y-3">

                @foreach($genreStats as $genre)

                    <div class="flex items-center justify-between">

                        <div class="flex-1">
                            <p class="font-semibold mb-1">{{ $genre->genre }}</p>

                            <div class="w-full bg-white/10 rounded-full h-2">
                                <div
                                    class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full"
                                    style="width: {{ ($genre->total / $genreStats->sum('total')) * 100 }}%">
                                </div>
                            </div>
                        </div>

                        <p class="text-gray-300 ml-4 font-bold">{{ $genre->total }}</p>

                    </div>

                @endforeach

            </div>

        @else

            <p class="text-center text-gray-400 py-6">
                Belum ada data genre.
            </p>

        @endif

    </div>

</div>

@endsection