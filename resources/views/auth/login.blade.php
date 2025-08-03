@extends('layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl animate-fadeIn">
        <!-- Header -->
        <div class="text-center mb-6">
            <svg class="w-12 h-12 mx-auto text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <h2 class="text-2xl font-bold text-purple-800 mt-2">Masuk Akun</h2>
            <p class="text-sm text-gray-600">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="input-field @error('email') border-red-500 @enderror" autofocus>
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="input-field @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                           class="text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-purple-600 hover:underline">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-primary w-full py-3">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-purple-600 font-medium hover:underline">Daftar sekarang</a>
        </p>
    </div>
</div>
@endsection
