<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beasiswa;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beasiswas = [
            [
                'nama' => 'Beasiswa Prestasi Akademik',
                'kategori' => 'Prestasi',
                'deskripsi' => 'Beasiswa ini diberikan kepada mahasiswa yang memiliki prestasi akademik excellent dengan IPK minimal 3.5. Beasiswa mencakup biaya kuliah penuh dan uang saku bulanan.',
                'gambar' => 'beasiswa/prestasi-akademik.jpg',
                'deadline' => '2024-12-31',
                'kuota' => '50 orang'
            ],
            [
                'nama' => 'Beasiswa Bantuan Ekonomi',
                'kategori' => 'Ekonomi',
                'deskripsi' => 'Program beasiswa untuk membantu mahasiswa dari keluarga kurang mampu agar dapat melanjutkan pendidikan dengan baik. Beasiswa berupa keringanan biaya kuliah hingga 75%.',
                'gambar' => 'beasiswa/bantuan-ekonomi.jpg',
                'deadline' => '2024-11-30',
                'kuota' => '100 orang'
            ],
            [
                'nama' => 'Beasiswa Research Excellence',
                'kategori' => 'Penelitian',
                'deskripsi' => 'Beasiswa khusus untuk mahasiswa yang aktif dalam penelitian dan pengembangan ilmu pengetahuan. Program ini mendukung mahasiswa dalam mengembangkan riset inovatif.',
                'gambar' => 'beasiswa/research-excellence.jpg',
                'deadline' => '2025-01-15',
                'kuota' => '25 orang'
            ],
            [
                'nama' => 'Beasiswa Atlet Berprestasi',
                'kategori' => 'Olahraga',
                'deskripsi' => 'Beasiswa untuk mahasiswa yang memiliki prestasi gemilang di bidang olahraga tingkat regional, nasional, atau internasional. Program ini mendukung pengembangan talenta olahraga sambil menempuh pendidikan.',
                'gambar' => 'beasiswa/atlet-berprestasi.jpg',
                'deadline' => '2024-12-20',
                'kuota' => '30 orang'
            ]
        ];

        foreach ($beasiswas as $beasiswa) {
            Beasiswa::create($beasiswa);
        }
    }
}