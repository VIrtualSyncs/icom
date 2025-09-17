<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HouseTypeController extends Controller
{
    public function index()
    {
        $houses = HouseType::latest()->paginate(10);
        return view('admin.house_types.index', compact('houses'));
    }

    public function create()
    {
        return view('admin.house_types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:150',
            'description'=>'nullable|string',
            'image'=>'nullable|image',
            'land_area'=>'required|numeric',
            'building_area'=>'required|numeric',
            'bedrooms'=>'required|integer',
            'bathrooms'=>'required|integer',
            'price'=>'required|numeric',
            'installment_note'=>'nullable|string',
            'facilities'=>'nullable|array'
        ]);

        $data['slug'] = Str::slug($request->name);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('houses','public');
        }

        HouseType::create($data);
        return redirect()->route('house-types.index')->with('success','Data berhasil ditambahkan');
    }

    public function show(HouseType $houseType)
    {
        return view('admin.house_types.show', compact('houseType'));
    }

    public function edit(HouseType $houseType)
    {
        return view('admin.house_types.edit', compact('houseType'));
    }

    public function update(Request $request, HouseType $houseType)
    {
        $data = $request->validate([
            'name'=>'required|string|max:150',
            'description'=>'nullable|string',
            'image'=>'nullable|image',
            'land_area'=>'required|numeric',
            'building_area'=>'required|numeric',
            'bedrooms'=>'required|integer',
            'bathrooms'=>'required|integer',
            'price'=>'required|numeric',
            'installment_note'=>'nullable|string',
            'facilities'=>'nullable|array'
        ]);

        $data['slug'] = Str::slug($request->name);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('houses','public');
        }

        $houseType->update($data);
        return redirect()->route('house-types.index')->with('success','Data berhasil diupdate');
    }

    public function destroy(HouseType $houseType)
    {
        $houseType->delete();
        return redirect()->route('house-types.index')->with('success','Data dihapus');
    }
}
