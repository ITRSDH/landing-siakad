<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galeris = [
            [
                'judul' => 'Gedung Rektorat Universitas',
                'kategori' => 'Gedung',
                'gambar' => json_encode(['galeri/gedung-rektorat.jpg']),
                'deskripsi' => 'Gedung utama yang menjadi pusat administrasi universitas dengan arsitektur modern yang menawan. Gedung berlantai 8 ini dilengkapi dengan fasilitas lengkap termasuk ruang rapat, auditorium, dan kantor-kantor pimpinan universitas.',
                'tanggal' => '2024-01-15'
            ],
            [
                'judul' => 'Laboratorium Komputer Terbaru',
                'kategori' => 'Fasilitas',
                'gambar' => json_encode(['galeri/lab-komputer.jpg']),
                'deskripsi' => 'Laboratorium komputer dengan 50 unit PC berspesifikasi tinggi dan software terkini. Dilengkapi dengan proyektor interaktif, AC, dan koneksi internet berkecepatan tinggi untuk mendukung pembelajaran programming dan desain.',
                'tanggal' => '2024-02-20'
            ],
            [
                'judul' => 'Perpustakaan Digital Modern',
                'kategori' => 'Fasilitas',
                'gambar' => json_encode(['galeri/perpustakaan.jpg']),
                'deskripsi' => 'Perpustakaan dengan konsep digital library yang menyediakan akses ke ribuan e-book dan jurnal internasional. Ruang baca yang nyaman dengan 300 kursi dan area diskusi untuk kegiatan akademik mahasiswa.',
                'tanggal' => '2024-03-10'
            ],
            [
                'judul' => 'Wisuda Periode Februari 2024',
                'kategori' => 'Kegiatan',
                'gambar' => json_encode(['galeri/wisuda-feb-2024.jpg']),
                'deskripsi' => 'Prosesi wisuda periode Februari 2024 yang dihadiri oleh 500 lulusan dari berbagai program studi. Acara berlangsung khidmat di Aula Utama dengan dihadiri keluarga dan para dosen pembimbing.',
                'tanggal' => '2024-02-25'
            ],
            [
                'judul' => 'Seminar Nasional Teknologi 2024',
                'kategori' => 'Kegiatan',
                'gambar' => json_encode(['galeri/seminar-teknologi.jpg']),
                'deskripsi' => 'Seminar nasional dengan tema "AI dan Future Technology" yang menghadirkan pembicara dari industri teknologi terkemuka. Dihadiri lebih dari 800 peserta dari berbagai universitas se-Indonesia.',
                'tanggal' => '2024-04-15'
            ],
            [
                'judul' => 'Lapangan Olahraga Multifungsi',
                'kategori' => 'Fasilitas',
                'gambar' => json_encode(['galeri/lapangan-olahraga.jpg']),
                'deskripsi' => 'Kompleks olahraga lengkap dengan lapangan basket, futsal, voli, dan track lari. Fasilitas ini mendukung kegiatan olahraga mahasiswa dan sering digunakan untuk turnamen antar fakultas.',
                'tanggal' => '2024-01-30'
            ]
        ];

        foreach ($galeris as $galeri) {
            Galeri::create($galeri);
        }
    }
}