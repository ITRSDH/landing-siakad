<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_background',
        'jumlah_program_studi',
        'jumlah_mahasiswa',
        'jumlah_dosen',
        'jumlah_mitra',
        'keunggulan',
        'logo',
        'nama_aplikasi',
        'deskripsi_footer',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'alamat',
        'telepon',
        'email'
    ];
    protected $casts = [
        'keunggulan' => 'array',
    ];
}
