<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Pegawai;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::enableQueryLog();
        $pegawai = Pegawai::get();
        

        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Pegawai::generateIdPegawai();
        $departemen = Departemen::get();
        $shift = Shift::get();
        return view('pegawai.create',compact('id','departemen','shift'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pegawai' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'shift' => 'required',
            'email' => 'required',
            'akses' => 'required'

        ]);
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'id_user' => $request->id_pegawai,
            'akses' => $request->akses
        ]);

        Pegawai::create([
            'id_user' => $request->id_pegawai,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'id_departemen' => $request->departemen,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'id_shift' => $request->shift
        ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $id_user = $pegawai->id_user;
        $user = User::where('id_user',$id_user)->get();
        $departemen = Departemen::get();
        $shift = Shift::get();
        return view('pegawai.edit',compact('pegawai','departemen','shift','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $id_user = $pegawai->id_user;
        $user = User::where('id_user',$id_user);
        
        $this->validate($request, [
            'id_pegawai' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'shift' => 'required',
            'email' => 'required',
            'akses' => 'required'

        ]);
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'id_user' => $request->id_pegawai,
            'akses' => $request->akses
        ]);

        $pegawai->update([
            'id_user' => $request->id_pegawai,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'id_departemen' => $request->departemen,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'id_shift' => $request->shift
        ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dirubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $id_user = $pegawai->id_user;
        $user = User::where('id_user',$id_user);
        
        $user->delete();
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
