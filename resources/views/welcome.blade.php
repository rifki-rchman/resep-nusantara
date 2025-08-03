<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resep Nusantara</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #9333ea;     /* Ungu */
            --color-secondary: #fb923c;   /* Jingga */
            --color-dark: #1f2937;
            --color-light: #f9fafb;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-light);
            color: var(--color-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--color-primary), var(--color-secondary));
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            color: var(--color-dark);
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--color-primary);
        }
    </style>
</head>
<body class="antialiased">

    <!-- Navigation -->
    <nav class="py-6 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L3 7l9 5 9-5-9-5zM3 17l9 5 9-5M3 12l9 5 9-5"/>
                </svg>
                <span class="text-lg font-bold">Resep Nusantara</span>
            </div>
            @if (Route::has('login'))
                <div class="space-x-4 hidden md:flex items-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- Hero -->
    <main class="flex-1 flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4">
            Jelajahi <span class="text-gradient">Resep Tradisional</span> Nusantara
        </h1>
        <p class="text-gray-600 text-lg max-w-xl">
            Temukan dan bagikan resep masakan daerah dari seluruh penjuru Indonesia dengan mudah dan menyenangkan.
        </p>

        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-primary">Masuk ke Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-primary">Mulai Sekarang</a>
                <a href="{{ route('register') }}" class="btn-primary bg-white border border-purple-500 text-purple-600 hover:bg-purple-50">Daftar Akun</a>
            @endauth
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-8 text-sm text-gray-500">
        &copy; {{ date('Y') }} Resep Nusantara. Dibuat dengan 💜 oleh kamu 😘
    </footer>

</body>
</html>
