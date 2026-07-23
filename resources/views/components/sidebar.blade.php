<!-- resources/views/components/sidebar.blade.php -->

<!-- Sidebar -->
<aside
    id="sidebar"
    class="fixed top-0 left-0 h-screen w-72 glass border-r border-white/10 transform -translate-x-full transition-transform duration-300 z-50">

    <div class="flex flex-col h-full">

        <!-- Sidebar Header -->
        <div class="flex justify-between items-center p-6 border-b border-white/10">

            <h2 class="text-2xl font-bold">
                <span class="text-red-600">Movie</span>Hub
            </h2>

            <button
                onclick="toggleSidebar()"
                class="text-2xl hover:text-red-500 transition p-1"
                aria-label="Close sidebar">
                ✕
            </button>

        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">

            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}"
                class="block rounded-xl p-3 transition {{ request()->routeIs('dashboard') ? 'bg-red-600/20 text-red-400 border border-red-500/30' : 'text-gray-300 hover:bg-white/5' }}">
                🏠 Dashboard
            </a>

            <!-- Films Link -->
            <a href="{{ route('film.index') }}"
                class="block rounded-xl p-3 transition {{ request()->routeIs('film.*') ? 'bg-red-600/20 text-red-400 border border-red-500/30' : 'text-gray-300 hover:bg-white/5' }}">
                🎬 Film
            </a>

            <!-- Users Link (Admin Only) -->
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('users.index') }}"
                    class="block rounded-xl p-3 transition {{ request()->routeIs('users.*') ? 'bg-red-600/20 text-red-400 border border-red-500/30' : 'text-gray-300 hover:bg-white/5' }}">
                    👥 User
                </a>
            @endif

        </nav>

        <!-- Sidebar Footer (Logout) -->
        <div class="p-3 border-t border-white/10">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="w-full text-left rounded-xl p-3 text-gray-300 hover:bg-red-600/20 hover:text-red-400 hover:border hover:border-red-500/30 transition">
                    🚪 Logout
                </button>

            </form>

        </div>

    </div>

</aside>

<!-- Sidebar Overlay/Backdrop (Mobile) -->
<div
    id="sidebar-overlay"
    class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity duration-300"
    onclick="toggleSidebar()">
</div>