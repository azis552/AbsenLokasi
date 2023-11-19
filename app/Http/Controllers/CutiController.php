<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function pengajuan_cuti()
    {
        $id = Auth::user()->id_user;
        $pegawai = Pegawai::where('id_user', '!=', $id)->get();
        return view('cuti.pengajuan',compact('pegawai'));
    }
    public function simpan_pengajuan(Request $request)
    {
        $id= Auth::user()->id_user;
        $this->validate($request, [
            'cuti' => 'required|max:255',
            'mulai_cuti' => 'required',
            'akhir_cuti' => 'required',
            'id_pegawai_pengganti' => 'required',
        ]);
        Cuti::create([
            'keperluan' => $request->cuti,
            'tanggal_pengajuan' => now()->toDateString(),
            'mulai_cuti' => $request->mulai_cuti,
            'akhir_cuti' => $request->akhir_cuti,
            'id_pegawai_pengganti' => $request->id_pegawai_pengganti,
            'status' => 'menunggu',
            'id_pegawai_cuti' => $id,
        ]);
        return redirect()->route('cuti.data_pengajuan')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function data_pengajuan()
    {
        $id = Auth::user()->id_user;
        $cuti = Cuti::where('id_pegawai_cuti', '=', $id)->get();
        return view('cuti.data_pengajuan',compact('cuti'));
    }
    public function data_pengajuan_hrd()
    {
        $cuti = Cuti::get();
        return view('cuti.data_pengajuanhrd',compact('cuti'));
    }
    public function update_status_approve(string $id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.approve',compact('cuti'));
    }
    public function update_status_reject(string $id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.reject',compact('cuti'));
    }
    public function simpan_update(Request $request, string $id)
    {
        $id_hrd= Auth::user()->id_user;
        $this->validate($request, [
            'catatan' => 'required',
        ]);
        $cuti = Cuti::findOrFail($id);

        $cuti->update([
            'catatan_hrd' => $request->catatan,
            'status' => $request->status,
            'id_pegawai_hrd' => $id_hrd,
        ]);

        return redirect()->route('cuti.data_pengajuan_hrd')->with(['success' => 'Data Berhasil Dirubah!']);

    }
}
