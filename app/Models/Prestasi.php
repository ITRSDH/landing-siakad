<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mahasiswa',
        'program_studi',
        'judul_prestasi',
        'tingkat',
        'tahun',
        'deskripsi',
        'gambar',
    ];
}
