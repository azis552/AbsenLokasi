<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['nama','jam_masuk','jam_keluar'];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_shift','id');
    }
}
