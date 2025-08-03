@extends('layout.app')

@section('title', 'Tambah Resep')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h1 class="text-2xl font-bold text-purple-800 mb-6">Tambah Resep Baru</h1>

        <form action="{{ route('reseps.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Resep</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                       class="input-field @error('judul') border-red-500 @enderror">
                @error('judul')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"
                          class="input-field @error('deskripsi') border-red-500 @enderror"
                          required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="bahan" class="block text-sm font-medium text-gray-700 mb-1">Bahan-bahan</label>
                <textarea name="bahan" id="bahan" rows="4"
                          class="input-field @error('bahan') border-red-500 @enderror"
                          required>{{ old('bahan') }}</textarea>
                @error('bahan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="langkah" class="block text-sm font-medium text-gray-700 mb-1">Langkah-langkah</label>
                <textarea name="langkah" id="langkah" rows="5"
                          class="input-field @error('langkah') border-red-500 @enderror"
                          required>{{ old('langkah') }}</textarea>
                @error('langkah')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" id="kategori_id"
                        class="input-field @error('kategori_id') border-red-500 @enderror"
                        required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar"
                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0 file:text-sm file:font-semibold
                              file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200">
                @error('gambar')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn-primary w-full py-3">Simpan Resep</button>
                
                <a href="{{ route('dashboard') }}" class="text-sm text-purple-700 hover:underline">
                    ← Kembali ke Dashboard
            </div>
        </form>
    </div>
</div>
@endsection
