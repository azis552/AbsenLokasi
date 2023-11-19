<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    use HasFactory;

    protected $fillable = ['latitude','longitude','radius','nama_lokasi'];
}
