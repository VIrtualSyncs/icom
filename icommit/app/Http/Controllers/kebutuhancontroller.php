<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan; // ✅ K besar
use Illuminate\Http\Request;

class KebutuhanController extends Controller
{
    public function index()
    {
        // pakai paginate kalau mau ->firstItem() dan ->links()
        $kebutuhan = Kebutuhan::paginate(10);

        return view('admin.kebutuhan.index', compact('kebutuhan'));
    }

    public function create()
    {
        return view('admin.kebutuhan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable|image|mimes:svg,webp,png|max:2048',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('kebutuhan_icons', 'public');
        } else {
            $iconPath = $request->input('icon'); // for CSS class or icon name
        }

        Kebutuhan::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $iconPath,
        ]);

        return redirect()->route('kebutuhan.index')
            ->with('success','Data kebutuhan <berhasil ditambahkan.');
    }

    public function edit(Kebutuhan $kebutuhan)
    {
        return view('admin.kebutuhan.edit', compact('kebutuhan'));
    }

    public function update(Request $request, Kebutuhan $kebutuhan)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable|image|mimes:svg,webp,png|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('icon')) {
            // Delete old icon if exists and is a file path
            if ($kebutuhan->icon && \Illuminate\Support\Facades\Storage::disk('public')->exists($kebutuhan->icon)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($kebutuhan->icon);
            }
            $data['icon'] = $request->file('icon')->store('kebutuhan_icons', 'public');
        }
        // If no file, keep current icon

        $kebutuhan->update($data);

        return redirect()->route('kebutuhan.index')
            ->with('success','Data kebutuhan berhasil diupdate.');
    }

    public function destroy(Kebutuhan $kebutuhan)
    {
        // Delete icon file if exists and is a file path
        if ($kebutuhan->icon && \Illuminate\Support\Facades\Storage::disk('public')->exists($kebutuhan->icon)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($kebutuhan->icon);
        }

        $kebutuhan->delete();
        return redirect()->route('kebutuhan.index')
            ->with('success','Data kebutuhan berhasil dihapus.');
    }

    public function show(Kebutuhan $kebutuhan)
    {
        // kirim 1 data kebutuhan ke view show
        return view('admin.kebutuhan.show', compact('kebutuhan'));
    }
}
