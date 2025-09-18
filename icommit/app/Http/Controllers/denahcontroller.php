<?php

namespace App\Http\Controllers;

use App\Models\denah;
use Illuminate\Http\Request;

class denahcontroller extends Controller
{
    public function index()
    {
        $denah = denah::paginate(10);

        return view('admin.denah.index', compact('denah'));
    }

    public function create()
    {
        return view('admin.denah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('denah_images', 'public');
        }

        denah::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('denah.index')
            ->with('success', 'Data denah berhasil ditambahkan.');
    }

    public function edit(denah $denah)
    {
        return view('admin.denah.edit', compact('denah'));
    }

    public function update(Request $request, denah $denah)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($denah->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($denah->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($denah->image);
            }
            $data['image'] = $request->file('image')->store('denah_images', 'public');
        }

        $denah->update($data);

        return redirect()->route('denah.index')
            ->with('success', 'Data denah berhasil diupdate.');
    }

    public function destroy(denah $denah)
    {
        // Delete image file if exists
        if ($denah->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($denah->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($denah->image);
        }

        $denah->delete();
        return redirect()->route('denah.index')
            ->with('success', 'Data denah berhasil dihapus.');
    }

    public function show(denah $denah)
    {
        return view('admin.denah.show', compact('denah'));
    }
}
