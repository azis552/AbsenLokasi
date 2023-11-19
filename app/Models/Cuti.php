<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal_pengajuan', 'keperluan', 'mulai_cuti', 'akhir_cuti', 'status', 'id_pegawai_cuti', 'id_pegawai_pengganti', 'id_pegawai_hrd', 'catatan_hrd'];
    public function pegawaiCuti()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai_cuti', 'id_user');
    }

    public function pegawaiPengganti()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai_pengganti', 'id_user');
    }

    public function pegawaiHRD()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai_hrd', 'id_user');
    }
}
