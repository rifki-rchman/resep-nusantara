<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Resep Nusantara</title>

    <!-- Fonts: Inter (no serif) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-purple-700 to-orange-400 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-wide">Resep Nusantara</a>
            <div class="space-x-4">
                @auth
                    <a href="{{ route('reseps.index') }}" class="hover:underline">Resep</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">@csrf
                        <button class="hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="hover:underline">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12 text-sm text-center text-gray-500 py-6">
        © {{ date('Y') }} Resep Nusantara. All rights reserved.
    </footer>

</body>
</html>
