@extends('layout.app')

@section('title', 'Resep')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-white via-orange-50 to-purple-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- Judul Halaman -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-purple-700 tracking-tight mb-2">
                Kumpulan Resep Nusantara
            </h1>
            <p class="text-lg text-gray-700 max-w-xl mx-auto">
                Temukan dan bagikan cita rasa khas Indonesia dari berbagai daerah ke seluruh penjuru dunia!
            </p>
        </div>

        <!-- Daftar Resep -->
        @if($reseps->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($reseps as $resep)
                    <div class="bg-white rounded-xl shadow hover:shadow-md overflow-hidden transition">
                        @if($resep->gambar)
                            <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->judul }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                Tidak Ada Gambar
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-black mb-1 truncate">{{ $resep->judul }}</h3>
                            <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $resep->deskripsi }}</p>
                            <span class="text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded-full">
                                {{ $resep->kategori->nama ?? 'Tanpa Kategori' }}
                            </span>
                            <div class="mt-3 text-right">
                                <a href="{{ route('reseps.show', $resep->id) }}"
                                    class="text-sm text-orange-600 hover:underline font-medium">Lihat Resep</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $reseps->links() }}
            </div>
        @else
            <div class="text-center text-gray-500 mt-20">
                Belum ada resep yang ditambahkan.
            </div>
        @endif

    </div>
</div>
@endsection
