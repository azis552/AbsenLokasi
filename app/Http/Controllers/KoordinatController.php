<?php

namespace App\Http\Controllers;

use App\Models\Koordinat;
use Illuminate\Http\Request;

class KoordinatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koordinats = Koordinat::get();

        return view('koordinat.index',compact('koordinats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('koordinat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lokasi' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric|min:1', // Minimal radius adalah 1 meter
        ]);

        $simpan = Koordinat::create([
            'nama_lokasi' => $request->nama_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius
        ]);

        return redirect()->route('koordinat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $koordinat = Koordinat::findOrFail($id);

        return view('koordinat.edit',compact('koordinat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_lokasi' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric|min:1', // Minimal radius adalah 1 meter
        ]);
        $koordinat = Koordinat::findOrFail($id);

        $koordinat->update([
            'nama_lokasi' => $request->nama_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius
        ]);

        return redirect()->route('koordinat.index')->with(['success' => 'Data Berhasil Dirubah!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $koordinat = Koordinat::findOrFail($id);

        $koordinat->delete();

        return redirect()->route('koordinat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
