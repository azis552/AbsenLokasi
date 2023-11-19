<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departemens = Departemen::get();

        return view('departemen.index',compact('departemens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:Departemens|max:255',
            'keterangan' => 'required',
        ]);

        Departemen::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('departemen.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $departemen = Departemen::findOrFail($id);

        return view('departemen.edit',compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'keterangan' => 'required',
        ]);
        $departemen = Departemen::findOrFail($id);
        $departemen->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('departemen.index')->with(['success' => 'Data Berhasil Dirubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();
            
        return redirect()->route('departemen.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
