<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','nama','jabatan','id_departemen','alamat','telepon','id_shift'];
    
    public static function generateIdPegawai()
    {
        return "P-".now()->format('Ymd').rand(1000, 9999);
    }
    public function departemen()
    {
        return $this->hasOne(Departemen::class,'id','id_departemen');
    }

    public function shift()
    {
        return $this->hasOne(Shift::class,'id','id_shift');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id_user','id_user');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class,'id_user','id_user');
    }
    public function cuti()
    {
        return $this->hasMany(Cuti::class,'id_user');
    }
}
