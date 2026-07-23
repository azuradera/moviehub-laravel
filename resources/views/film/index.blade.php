@extends('layouts.moviehub')

@section('content')

<div class="space-y-6">

    @if(session('success'))
        <div class="glass p-4 border border-green-500 text-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">
                Daftar Film
            </h1>
            <p class="text-gray-300">
                Kelola seluruh data film.
            </p>
        </div>
    </div>

    <div class="flex justify-between items-center gap-4">
        <form action="{{ route('film.index') }}" method="GET" class="flex-1">
            <input
                type="text"
                name="search"
                placeholder="Cari judul, genre atau sutradara..."
                value="{{ request('search') }}"
                class="rounded-xl border px-4 py-2 w-full text-black">
        </form>

        @if(auth()->user()->role == 'admin')
        <a href="{{ route('film.create') }}"
            class="btn-red px-5 py-3 rounded-xl whitespace-nowrap">
            + Tambah Film
        </a>
        @endif

        <a href="{{ route('film.pdf') }}"
            class="bg-green-600 px-5 py-3 rounded-xl text-white whitespace-nowrap">
            Export PDF
        </a>

        <a href="{{ route('film.excel') }}"
            class="bg-emerald-600 text-white px-5 py-3 rounded-xl whitespace-nowrap">
            Export Excel
        </a>
    </div>

    <div class="glass overflow-hidden">
        <table class="w-full">
            <thead class="bg-white/10">
                <tr>
                    <th class="p-4 text-left">Poster</th>
                    <th class="p-4 text-left">Judul</th>
                    <th class="p-4 text-left">Genre</th>
                    <th class="p-4 text-left">Sutradara</th>
                    <th class="p-4 text-left">Tahun</th>
                    <th class="p-4 text-left">Rating</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($films as $film)
                <tr class="border-t border-white/10">
                    <td class="p-4">
                        @if($film->poster)
                            <img
                                src="{{ asset('storage/'.$film->poster) }}"
                                width="80"
                                class="rounded-lg">
                        @else
                            -
                        @endif
                    </td>

                    <td class="p-4">{{ $film->title }}</td>

                    <td class="p-4">{{ $film->genre }}</td>

                    <td class="p-4">{{ $film->director }}</td>

                    <td class="p-4">{{ $film->release_year }}</td>

                    <td class="p-4">{{ $film->rating }}</td>

                    <td class="p-4">
                        <div class="flex justify-center gap-2">
                            <a
                                href="{{ route('film.show',$film) }}"
                                class="px-3 py-2 bg-blue-600 rounded-lg">
                                Detail
                            </a>

                            @if(auth()->user()->role == 'admin')
                            <a
                                href="{{ route('film.edit',$film) }}"
                                class="px-3 py-2 bg-yellow-500 rounded-lg">
                                Edit
                            </a>

                            <form
                                action="{{ route('film.destroy',$film) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus film ini?')"
                                    class="px-3 py-2 bg-red-600 rounded-lg">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="7"
                        class="text-center p-6 text-gray-400">
                        Belum ada data film.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $films->links() }}
    </div>

</div>

@endsection