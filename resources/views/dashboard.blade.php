@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Heading -->
    <div class="mb-4 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-purple-900">Selamat Datang di Dashboard</h1>
            <p class="text-sm text-gray-600 mt-1">Kelola resep dan kategori favoritmu dengan mudah.</p>
        </div>
        <a href="{{ route('reseps.create') }}" class="btn-primary">
            + Tambah Resep
        </a>
    </div>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-sm text-gray-500">Total Resep</h3>
            <p class="text-3xl font-semibold text-purple-700">{{ $totalResep }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-sm text-gray-500">Total Kategori</h3>
            <p class="text-3xl font-semibold text-orange-500">{{ $totalKategori }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-sm text-gray-500">Resep Terbaru</h3>
            @if($latestResep)
                <p class="mt-1 text-purple-700 font-medium">{{ $latestResep->judul }}</p>
            @else
                <p class="mt-1 text-gray-400 italic">Belum ada resep</p>
            @endif
        </div>
    </div>

    <!-- Daftar Semua Resep -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold text-purple-800 mb-4">Daftar Resep</h3>
        <ul class="divide-y divide-gray-200">
            @forelse ($reseps as $resep)
                <li class="py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-800">{{ $resep->judul }}</p>
                            <p class="text-sm text-gray-500">{{ $resep->kategori->nama ?? '-' }}</p>
                        </div>
                        <a href="{{ route('reseps.show', $resep->id) }}"
                           class="text-sm text-orange-600 hover:underline">Lihat</a>
                    </div>
                </li>
            @empty
                <li class="py-4 text-gray-500 italic">Belum ada resep.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
