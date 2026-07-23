@extends('layouts.moviehub')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="glass p-8">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold">
                Detail Film
            </h1>

            <a href="{{ route('film.index') }}"
                class="px-5 py-2 bg-slate-700 rounded-xl hover:bg-slate-600 transition">

                Kembali

            </a>

        </div>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Kolom Poster -->
            <div class="md:col-span-1">

                @if($film->poster)

                    <img
                        src="{{ asset('storage/'.$film->poster) }}"
                        class="rounded-xl w-full object-cover shadow-lg">

                @else

                    <div class="rounded-xl w-full h-96 bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-400">Tidak ada poster</span>
                    </div>

                @endif

            </div>

            <!-- Kolom Detail -->
            <div class="md:col-span-2">

                <h2 class="text-gray-400 text-sm mb-2">Judul Film</h2>
                <p class="text-3xl font-semibold mb-6">
                    {{ $film->title }}
                </p>

                <h2 class="text-gray-400 text-sm mb-2">Genre</h2>
                <p class="mb-6">
                    {{ $film->genre }}
                </p>

                <h2 class="text-gray-400 text-sm mb-2">Sutradara</h2>
                <p class="mb-6">
                    {{ $film->director }}
                </p>

                <h2 class="text-gray-400 text-sm mb-2">Tahun Rilis</h2>
                <p class="mb-6">
                    {{ $film->release_year }}
                </p>

                <h2 class="text-gray-400 text-sm mb-2">Durasi</h2>
                <p class="mb-6">
                    {{ $film->duration }} Menit
                </p>

                <h2 class="text-gray-400 text-sm mb-2">Rating</h2>
                <p class="mb-8 text-2xl">
                    ⭐ {{ $film->rating }}/10
                </p>

                <h2 class="text-gray-400 text-sm mb-3">
                    Sinopsis
                </h2>

                <div class="glass p-5 text-gray-300 leading-relaxed">

                    {{ $film->synopsis }}

                </div>

            </div>

        </div>

        <!-- Tombol Aksi -->
        @if(auth()->user()->role == 'admin')
        <div class="flex gap-3 mt-8">

            <a href="{{ route('film.edit', $film) }}"
                class="px-5 py-3 bg-yellow-500 rounded-xl hover:bg-yellow-600 transition font-semibold">

                Edit

            </a>

            <form action="{{ route('film.destroy', $film) }}" method="POST" class="inline">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus film ini secara permanen?')"
                    class="px-5 py-3 bg-red-600 rounded-xl hover:bg-red-700 transition font-semibold">

                    Hapus

                </button>

            </form>

        </div>
        @endif

    </div>

</div>

@endsection