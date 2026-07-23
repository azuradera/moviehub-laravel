<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub - Selamat Datang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-black text-white min-h-screen flex items-center justify-center px-4">

    <div class="max-w-2xl w-full text-center space-y-8">

        <!-- Logo -->
        <h1 class="text-5xl sm:text-6xl font-bold">
            <span class="text-red-600">Movie</span>Hub
        </h1>

        <!-- Glass Card -->
        <div class="glass p-10 rounded-2xl space-y-6">

            <h2 class="text-3xl font-bold">
                Selamat Datang di MovieHub
            </h2>

            <p class="text-gray-300 leading-relaxed">
                Kelola, jelajahi, dan temukan koleksi film favoritmu.
                Silakan masuk atau daftar untuk mulai menggunakan MovieHub.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="btn-red px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition">
                        Ke Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-8 py-3 rounded-xl bg-slate-700 font-semibold hover:bg-slate-600 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="btn-red px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition">
                            Register
                        </a>
                    @endif
                @endauth

            </div>

        </div>

        <p class="text-gray-500 text-sm">
            MovieHub © {{ date('Y') }}
        </p>

    </div>

</body>

</html>