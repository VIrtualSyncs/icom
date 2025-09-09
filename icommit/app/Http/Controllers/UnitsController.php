<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Units::latest()->paginate(10);
        $stats = Units::getStats();

        return view('admin.units.index', compact('units', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string|max:255',
            'luas_tanah' => 'required|string|max:255',
            'luas_bangunan' => 'required|string|max:255',
            'kamar_tidur' => 'required|string|max:255',
            'kamar_mandi' => 'required|string|max:255',
            'status' => 'required|in:tersedia,booking,terjual',
        ]);

        Units::create($request->all());

        return redirect()->route('units.index')->with('success', 'Unit rumah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Units $unit)
    {
        return view('admin.units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Units $unit)
    {
        return view('admin.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Units $unit)
    {
        $request->validate([
            'tipe' => 'required|string|max:255',
            'luas_tanah' => 'required|string|max:255',
            'luas_bangunan' => 'required|string|max:255',
            'kamar_tidur' => 'required|string|max:255',
            'kamar_mandi' => 'required|string|max:255',
            'status' => 'required|in:tersedia,booking,terjual',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')->with('success', 'Unit rumah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Units $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit rumah berhasil dihapus.');
    }
}
