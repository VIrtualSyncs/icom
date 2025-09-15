<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Highlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HighlightController extends Controller
{
    // List semua highlights
    public function index()
    {
        $highlights = Highlight::latest()->paginate(10);
        return view('admin.highlights.index', compact('highlights'));
    }

    // Form tambah highlight baru
    public function create()
    {
        return view('admin.highlights.create');
    }

    // Simpan highlight baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:svg,webp,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('highlights', 'public');
        }

        Highlight::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('highlights.index')->with('success', 'Highlight berhasil ditambahkan.');
    }

    // Detail highlight
    public function show(Highlight $highlight)
    {
        return view('admin.highlights.show', compact('highlight'));
    }

    // Form edit highlight
    public function edit(Highlight $highlight)
    {
        return view('admin.highlights.edit', compact('highlight'));
    }

    // Update highlight
    public function update(Request $request, Highlight $highlight)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:svg,webp,png|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($highlight->image && Storage::disk('public')->exists($highlight->image)) {
                Storage::disk('public')->delete($highlight->image);
            }
            $data['image'] = $request->file('image')->store('highlights', 'public');
        }

        $highlight->update($data);

        return redirect()->route('highlights.index')->with('success', 'Highlight berhasil diperbarui.');
    }

    // Hapus highlight
    public function destroy(Highlight $highlight)
    {
        // Hapus gambar dari storage
        if ($highlight->image && Storage::disk('public')->exists($highlight->image)) {
            Storage::disk('public')->delete($highlight->image);
        }

        $highlight->delete();
        return redirect()->route('highlights.index')->with('success', 'Highlight berhasil dihapus.');
    }
}
