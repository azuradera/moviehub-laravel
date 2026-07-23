<!-- resources/views/layouts/moviehub.blade.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub - Dashboard</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-black text-white min-h-screen">

    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Sidebar Component -->
    @include('components.sidebar')

    @if(session('success'))

<div
    id="success-alert"
    class="fixed top-5 right-5
           bg-green-600
           text-white
           px-6 py-4
           rounded-xl
           shadow-xl
           z-50">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div
    id="error-alert"
    class="fixed top-5 right-5
           bg-red-600
           text-white
           px-6 py-4
           rounded-xl
           shadow-xl
           z-50">

    {{ session('error') }}

</div>

@endif

    <!-- Main Content Area -->
    <main class="pt-[72px]">
        
        <div class="container mx-auto px-4 py-6">
            <div class="fade-in"><div class="fade-in">
    
            <!-- Page Content -->
            @yield('content')

        </div>

    </main>

    <!-- Toggle Sidebar Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');

            // Close sidebar when clicking on a link (mobile)
            if (window.innerWidth < 768) {
                sidebar.addEventListener('click', (e) => {
                    if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON') {
                        setTimeout(() => {
                            sidebar.classList.add('-translate-x-full');
                            overlay.classList.add('hidden');
                        }, 100);
                    }
                });
            }
        }

        // Auto-hide success messages after 3 seconds
        const alerts = [
            document.getElementById('success-alert'),
            document.getElementById('error-alert')
        ];

        alerts.forEach(alert => {

            if(alert){

                setTimeout(() => {

                    alert.style.opacity = '0';

                    setTimeout(() => {

                        alert.remove();

                    },300);

                },3000);

            }

        });
    </script>
<footer
    class="text-center text-gray-500 text-sm py-8">

    MovieHub © {{ date('Y') }}

    Dibuat menggunakan Laravel 13

</footer>
</body>

</html>