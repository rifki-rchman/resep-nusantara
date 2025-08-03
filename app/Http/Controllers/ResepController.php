<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth; // ✅ Diperlukan untuk cek login dan ambil user id

class ResepController extends Controller
{
    public function index(Request $request)
    {
        $query = Resep::with('kategori')->latest();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $reseps = $query->paginate(8);

        return view('home', compact('reseps'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('reseps.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_resep', 'public');
        }

        $data['user_id'] = Auth::id(); // ✅ Simpan ID user yang login

        Resep::create($data);

        return redirect()->route('dashboard')
                         ->with('success', 'Resep berhasil ditambahkan!');
    }

    public function show($id)
    {
        $resep = Resep::with('kategori')->findOrFail($id);
        return view('reseps.show', compact('resep'));
    }

    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        $kategoris = Kategori::all();
        return view('reseps.edit', compact('resep', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $resep = Resep::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_resep', 'public');
        }

        $resep->update($data);

        return redirect()->route('dashboard')
                         ->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Resep berhasil dihapus!');
    }
}
