<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKampus extends Model
{
    use HasFactory;

    protected $table = 'profilkampus';

    protected $fillable = [
        'judul',
        'deskripsi',
        'visi',
        'misi',
        'struktur_image',
        'fasilitas',
    ];
}
