<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub - {{ $title ?? 'Auth' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-black text-white min-h-screen flex flex-col items-center justify-center px-4 py-10">

    <div class="w-full max-w-md space-y-6">

        <!-- Logo -->
        <div class="text-center">
            <a href="{{ url('/') }}" class="text-4xl font-bold">
                <span class="text-red-600">Movie</span>Hub
            </a>
        </div>

        <!-- Card -->
        <div class="glass p-8 rounded-2xl">
            {{ $slot }}
        </div>

    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            btn.querySelector('.icon-eye-open').classList.toggle('hidden', isHidden);
            btn.querySelector('.icon-eye-closed').classList.toggle('hidden', !isHidden);
        }
    </script>

</body>

</html>