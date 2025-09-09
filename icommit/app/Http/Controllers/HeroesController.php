<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\heroes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroesController extends Controller
{
    // List semua heroes
    public function index()
    {
        $heroes = heroes::latest()->paginate(10);
        return view('admin.heroes.index', compact('heroes'));
    }

    // Form tambah hero baru
    public function create()
    {
        return view('admin.heroes.create');
    }

    // Simpan hero baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi_hero' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('heroes', 'public');
        }

        heroes::create([
            'nama' => $request->nama,
            'deskripsi_hero' => $request->deskripsi_hero,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('heroes.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    // Detail hero
    public function show(heroes $hero)
    {
        return view('admin.heroes.show', compact('hero'));
    }

    // Form edit hero
    public function edit(heroes $hero)
    {
        return view('admin.heroes.edit', compact('hero'));
    }

    // Update hero
    public function update(Request $request, heroes $hero)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi_hero' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi_hero' => $request->deskripsi_hero,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($hero->gambar && Storage::disk('public')->exists($hero->gambar)) {
                Storage::disk('public')->delete($hero->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('heroes', 'public');
        }

        $hero->update($data);

        return redirect()->route('heroes.index')->with('success', 'Hero berhasil diperbarui.');
    }

    // Hapus hero
    public function destroy(heroes $hero)
    {
        // Hapus gambar dari storage
        if ($hero->gambar && Storage::disk('public')->exists($hero->gambar)) {
            Storage::disk('public')->delete($hero->gambar);
        }

        $hero->delete();
        return redirect()->route('heroes.index')->with('success', 'Hero berhasil dihapus.');
    }
}
