@extends('layout.app')

@section('title', 'Beranda')

@section('content')
<div class="min-h-screen bg-white pt-32 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- Hero -->
        <div class="text-center mb-14">
            <h1 class="text-4xl md:text-5xl font-extrabold text-black mb-4 leading-tight tracking-tight">
                Selamat Datang di <span class="text-purple-700">ResepNusantara</span>
            </h1>
            <p class="text-lg text-gray-800 max-w-3xl mx-auto font-medium">
                Temukan dan bagikan cita rasa khas Indonesia dari berbagai daerah ke seluruh penjuru dunia!
            </p>

            <!-- Search -->
<form method="GET" action="{{ route('reseps.index') }}" class="mt-8 mb-12 max-w-xl mx-auto relative">
    <input type="text" name="search" value="{{ request('search') }}"
        placeholder="Cari resep favoritmu..."
        class="w-full pl-5 pr-14 py-4 rounded-full border border-gray-300 shadow focus:ring-2 focus:ring-purple-500 focus:outline-none text-gray-800 text-base transition">
    <button type="submit"
        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-purple-700 hover:bg-purple-800 text-white rounded-full px-5 py-2 font-semibold text-sm transition">
        Cari
    </button>
</form>




        <!-- Resep Preview -->
        @if($reseps->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($reseps as $resep)
           <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition overflow-hidden flex flex-col">


                <div class="w-full aspect-[3/4] bg-gray-200 relative">
                    @if($resep->gambar)
    <img src="{{ asset('storage/' . $resep->gambar) }}" alt="{{ $resep->judul }}" class="w-full h-full object-cover">
@else
    <div class="flex items-center justify-center h-full text-gray-500 text-sm">Tidak ada gambar</div>
@endif

                </div>
                <div class="p-4 flex flex-col flex-1">
                    <h3 class="text-lg font-bold text-black mb-1">{{ $resep->judul }}</h3>
                    <p class="text-sm text-gray-700 mb-2 line-clamp-2">{{ $resep->description }}</p>
                    <span class="inline-block bg-purple-100 text-purple-700 text-xs font-semibold px-3 py-1 rounded-full mb-4">
                        {{ $resep->kategori->nama ?? 'Tanpa Kategori' }}
                    </span>
                    <a href="{{ route('reseps.show', $resep) }}" class="mt-auto inline-block text-purple-700 hover:underline text-sm font-semibold">
                        Lihat Resep →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-500 font-medium">
            Belum ada resep yang ditambahkan.
        </div>
        @endif

    </div>
</div>
@endsection
