@extends('layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl animate-fadeIn">
        <!-- Header -->
        <div class="text-center mb-6">
            <svg class="w-12 h-12 mx-auto text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <h2 class="text-2xl font-bold text-orange-700 mt-2">Buat Akun</h2>
            <p class="text-sm text-gray-600">Daftar untuk mulai berbagi resep!</p>
        </div>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="input-field @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="input-field @error('email') border-red-500 @enderror">
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

            <div>
                <label for="password_confirmation" class="block text-sm text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="input-field">
            </div>

            <button type="submit" class="btn-primary w-full py-3">
                Daftar Sekarang
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-orange-600 font-medium hover:underline">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection
