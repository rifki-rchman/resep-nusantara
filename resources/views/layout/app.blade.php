<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Resep Nusantara') }}</title>

    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-black antialiased">

    <!-- Navbar -->
    <!-- Navbar -->
<nav class="bg-gradient-to-r from-purple-700 to-orange-500 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="nav-logo">ResepNusantara</a>

        <!-- Menu -->
        <div class="space-x-4 text-sm">
            @auth
    {{-- <a href="{{ route('dashboard') }}" class="hover:underline font-medium">Dashboard</a> --}}
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="hover:underline font-medium">Logout</button>
    </form>
@else
    <a href="{{ route('login') }}" class="hover:bg-white hover:text-purple-700 px-3 py-1 rounded-md transition font-medium bg-white bg-opacity-10 text-white">Login</a>
    <a href="{{ route('register') }}" class="hover:bg-white hover:text-orange-600 px-3 py-1 rounded-md transition font-medium bg-white bg-opacity-10 text-white">Daftar</a>
@endauth
        </div>
    </div>
</nav>




    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-6xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Resep Nusantara. All rights reserved.
        </div>
    </footer>

</body>
</html>
