<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable =['id_user','tanggal','jam','status','latitude','longitude'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_user', 'id_user');
    }
}
