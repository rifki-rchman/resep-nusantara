@extends('layout.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-purple-900">Kategori Resep</h1>
            <p class="text-sm text-gray-600 mt-1">Daftar kategori yang tersedia untuk resep-resep kamu.</p>
        </div>

        <a href="{{ route('kategoris.create') }}" class="btn-primary flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Kategori
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-purple-100 text-purple-700">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">No</th>
                    <th class="px-6 py-3 text-left font-semibold">Nama Kategori</th>
                    <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($kategoris as $index => $kategori)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $kategori->nama }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-3">
                                <a href="{{ route('kategoris.edit', $kategori->id) }}"
                                   class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500 italic">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
