<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\heroes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroesController extends Controller
{
    /**
     * Form tambah hero baru
     */
    public function create()
    {
        return view('admin.heroes.create');
    }

    /**
     * Simpan hero baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'deskripsi_hero' => 'required|string',
            'gambar'         => 'required|image|mimes:svg,webp,png|max:2048',
        ]);

        // simpan gambar
        $gambarPath = $request->file('gambar')->store('heroes', 'public');

        // simpan data ke database
        $hero = heroes::create([
            'nama'           => $request->nama,
            'deskripsi_hero' => $request->deskripsi_hero,
            'gambar'         => $gambarPath,
        ]);

        // setelah create, redirect ke halaman detail hero (show)
        return redirect()
            ->route('heroes.show', $hero) // <<=== PARAMETER dikirim
            ->with('success', 'Hero berhasil ditambahkan.');
    }

    /**
     * Detail hero
     */
    public function show(heroes $hero)
    {
        return view('admin.heroes.show', compact('hero'));
    }

    /**
     * Form edit hero
     */
    public function edit(heroes $hero)
    {
        return view('admin.heroes.edit', compact('hero'));
    }

    /**
     * Update hero
     */
    public function update(Request $request, heroes $hero)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'deskripsi_hero' => 'required|string',
            'gambar'         => 'nullable|image|mimes:svg,webp,png|max:2048',
        ]);

        $data = [
            'nama'           => $request->nama,
            'deskripsi_hero' => $request->deskripsi_hero,
        ];

        // jika upload gambar baru
        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($hero->gambar && Storage::disk('public')->exists($hero->gambar)) {
                Storage::disk('public')->delete($hero->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('heroes', 'public');
        }

        // update database
        $hero->update($data);

        // redirect ke halaman detail hero
        return redirect()
            ->route('heroes.show', $hero) // <<=== PARAMETER dikirim
            ->with('success', 'Hero berhasil diperbarui.');
    }
}
