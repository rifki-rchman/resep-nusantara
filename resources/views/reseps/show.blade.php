@extends('layout.app')

@section('title', $resep->judul)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-12"> {{-- Tambah padding atas --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-fadeIn">
        @if($resep->gambar)
    <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->judul }}" class="w-full h-64 object-cover">
@endif


        <div class="p-6 space-y-4">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-purple-900">{{ $resep->judul }}</h1>
                    <p class="text-sm text-orange-500 mt-1">{{ $resep->kategori->nama ?? 'Tanpa Kategori' }}</p>
                </div>

                @auth
    <div class="flex gap-2 text-sm">
        <a href="{{ route('reseps.edit', $resep->id) }}" class="btn-secondary px-3 py-1">
             Edit
        </a>
        <form action="{{ route('reseps.destroy', $resep->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus resep ini?')" class="inline-block">
            @csrf
            @method('DELETE')
            <button class="btn-danger px-3 py-1"> Hapus</button>
        </form>
    </div>
@endauth

            </div>

            <div>
                <h2 class="text-xl font-semibold text-purple-800 mb-2">Deskripsi</h2>
                <p class="text-gray-700">{{ $resep->deskripsi }}</p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-purple-800 mb-2">Bahan-bahan</h2>
                <div class="whitespace-pre-line text-gray-700">{{ $resep->bahan }}</div>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-purple-800 mb-2">Langkah-langkah</h2>
                <div class="whitespace-pre-line text-gray-700">{{ $resep->langkah }}</div>
            </div>

            {{-- Tombol kembali dinamis berdasarkan status login --}}
<div class="pt-6">
    @auth
        <a href="{{ route('dashboard') }}" class="btn-secondary">
            ← Kembali ke Dashboard
        </a>
    @else
        <a href="{{ route('reseps.index') }}" class="btn-secondary">
            ← Kembali ke Beranda
        </a>
    @endauth
</div>

        </div>
    </div>
</div>
@endsection
