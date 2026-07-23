<x-guest-layout>

    <h1 class="text-2xl font-bold mb-2 text-center">
        Buat Akun MovieHub
    </h1>

    <p class="text-gray-400 text-sm text-center mb-6">
        Daftar untuk mulai mengelola koleksi filmmu.
    </p>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-5 rounded-xl bg-red-600/20 border border-red-500 p-4">
            <ul class="list-disc list-inside text-red-300">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block mb-2 font-semibold text-gray-300 text-sm">Nama</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Nama lengkap"
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-red-500 focus:outline-none">
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-2 font-semibold text-gray-300 text-sm">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                placeholder="nama@email.com"
                class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 text-white focus:border-red-500 focus:outline-none">
        </div>

        <!-- Password -->
        <div>
            <label class="block mb-2 font-semibold text-gray-300 text-sm">Password</label>
            <div class="relative">
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Minimal 8 karakter"
                    class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 pr-12 text-white focus:border-red-500 focus:outline-none">

                <button
                    type="button"
                    onclick="togglePassword('password', this)"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition"
                    aria-label="Tampilkan password">

                    <svg class="icon-eye-open w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <svg class="icon-eye-closed hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18M10.584 10.587a2 2 0 002.829 2.829M9.363 5.365A9.466 9.466 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.02 10.02 0 01-4.132 5.411M6.423 6.418C4.34 7.796 2.87 9.716 2.458 12c.673 3.03 3.096 5.462 6.076 6.402" />
                    </svg>

                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block mb-2 font-semibold text-gray-300 text-sm">Konfirmasi Password</label>
            <div class="relative">
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Ulangi password"
                    class="w-full rounded-xl bg-slate-800 border border-slate-600 p-3 pr-12 text-white focus:border-red-500 focus:outline-none">

                <button
                    type="button"
                    onclick="togglePassword('password_confirmation', this)"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition"
                    aria-label="Tampilkan password">

                    <svg class="icon-eye-open w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <svg class="icon-eye-closed hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18M10.584 10.587a2 2 0 002.829 2.829M9.363 5.365A9.466 9.466 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.02 10.02 0 01-4.132 5.411M6.423 6.418C4.34 7.796 2.87 9.716 2.458 12c.673 3.03 3.096 5.462 6.076 6.402" />
                    </svg>

                </button>
            </div>
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="w-full btn-red px-6 py-3 rounded-xl font-semibold hover:opacity-90 transition">
            Daftar
        </button>

        <p class="text-center text-sm text-gray-400 pt-2">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300 font-semibold">
                Masuk di sini
            </a>
        </p>

    </form>

</x-guest-layout>