<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalResep = Resep::count();
        $totalKategori = Kategori::count();
        $latestResep = Resep::latest()->first();
        $reseps = Resep::with('kategori')->latest()->get(); // GANTI recentReseps ke reseps

        $kategoris = Kategori::withCount('reseps')->get();
        $kategoriLabels = $kategoris->pluck('nama');
        $kategoriData = $kategoris->pluck('reseps_count');

        return view('dashboard', compact(
            'totalResep',
            'totalKategori',
            'latestResep',
            'reseps',               // GANTI recentReseps ke reseps
            'kategoriLabels',
            'kategoriData'
        ));
    }
}
