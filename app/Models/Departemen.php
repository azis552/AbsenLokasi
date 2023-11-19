<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = ['nama','keterangan'];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id','id_departemen');
    }
}
