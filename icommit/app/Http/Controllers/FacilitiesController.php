<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilitiesController extends Controller
{
    // List semua facilities
    public function index()
    {
        $facilities = Facilities::latest()->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }

    // Form tambah facility baru
    public function create()
    {
        return view('admin.facilities.create');
    }

    // Simpan facility baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:svg,webp,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('facilities', 'public');
        }

        Facilities::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('facilities.index')->with('success', 'Facility berhasil ditambahkan.');
    }

    // Detail facility
    public function show(Facilities $facility)
    {
        return view('admin.facilities.show', compact('facility'));
    }

    // Form edit facility
    public function edit(Facilities $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    // Update facility
    public function update(Request $request, Facilities $facility)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:svg,webp,png|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($facility->gambar && Storage::disk('public')->exists($facility->gambar)) {
                Storage::disk('public')->delete($facility->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('facilities', 'public');
        }

        $facility->update($data);

        return redirect()->route('facilities.index')->with('success', 'Facility berhasil diperbarui.');
    }

    // Hapus facility
    public function destroy(Facilities $facility)
    {
        // Hapus gambar dari storage
        if ($facility->gambar && Storage::disk('public')->exists($facility->gambar)) {
            Storage::disk('public')->delete($facility->gambar);
        }

        $facility->delete();
        return redirect()->route('facilities.index')->with('success', 'Facility berhasil dihapus.');
    }
}
