<!-- resources/views/components/navbar.blade.php -->

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 glass border-b border-white/10 z-40 px-6 py-4">

    <div class="flex items-center justify-between">

        <!-- Left Section: Menu Button + Branding -->
        <div class="flex items-center gap-4">

            <button
                onclick="toggleSidebar()"
                class="text-2xl p-2 hover:text-red-500 hover:bg-white/5 rounded-lg transition"
                aria-label="Toggle sidebar">
                ☰
            </button>

            <h1 class="text-xl font-bold hidden sm:block">
                <span class="text-red-600">Movie</span>Hub
            </h1>

        </div>

        <!-- Right Section: User Info -->
        <div class="flex items-center gap-3">

            <div class="text-right hidden sm:block">

                <p class="font-semibold text-sm">
                    {{ Auth::user()->name }}
                </p>

                <p class="text-xs text-gray-400 capitalize">
                    {{ Auth::user()->role }}
                </p>

            </div>

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=E50914&color=fff"
                alt="{{ Auth::user()->name }}"
                class="w-10 h-10 rounded-full border border-white/20 hover:border-red-500/50 transition">

        </div>

    </div>

</nav>