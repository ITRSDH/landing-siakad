<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestasis = [
            [
                'nama_mahasiswa' => 'Deva Pratama',
                'program_studi' => 'Teknik Informatika',
                'judul_prestasi' => 'Juara 1 Kompetisi Startup Nasional 2024',
                'tingkat' => 'nasional',
                'tahun' => 2024,
                'deskripsi' => 'Tim mahasiswa Teknik Informatika berhasil meraih juara 1 dalam Kompetisi Startup Nasional 2024 dengan inovasi aplikasi "EduTech Learning". Aplikasi ini menggunakan teknologi AI untuk personalisasi pembelajaran yang dapat meningkatkan efektivitas belajar hingga 40%.',
                'gambar' => 'prestasi/startup-nasional-2024.jpg'
            ],
            [
                'nama_mahasiswa' => 'Rizal Firmansyah',
                'program_studi' => 'Manajemen Olahraga',
                'judul_prestasi' => 'Juara 1 LIMA Basketball Championship 2024',
                'tingkat' => 'nasional',
                'tahun' => 2024,
                'deskripsi' => 'Tim basket universitas berhasil menjadi juara LIMA Basketball Championship 2024 setelah mengalahkan 32 tim dari seluruh Indonesia. Perjalanan menuju gelar juara penuh dengan perjuangan dan dedikasi tinggi.',
                'gambar' => 'prestasi/lima-basketball-2024.jpg'
            ],
            [
                'nama_mahasiswa' => 'Yoga Pratama',
                'program_studi' => 'Teknik Elektro',
                'judul_prestasi' => 'Best Paper Award International Conference AI 2024',
                'tingkat' => 'internasional',
                'tahun' => 2024,
                'deskripsi' => 'Penelitian tentang "Machine Learning for Renewable Energy Optimization" meraih penghargaan Best Paper dalam konferensi internasional AI yang diselenggarakan di Singapura.',
                'gambar' => 'prestasi/ieee-ai-conference-2024.jpg'
            ],
            [
                'nama_mahasiswa' => 'Indira Sari',
                'program_studi' => 'Seni Musik',
                'judul_prestasi' => 'Juara 2 Festival Paduan Suara Se-Jawa Barat 2024',
                'tingkat' => 'nasional',
                'tahun' => 2024,
                'deskripsi' => 'UKM Paduan Suara universitas meraih juara 2 dalam Festival Paduan Suara Se-Jawa Barat dengan membawakan repertoar lagu daerah dan klasik yang memukau juri dan penonton.',
                'gambar' => 'prestasi/paduan-suara-jabar-2024.jpg'
            ],
            [
                'nama_mahasiswa' => 'Farhan Ahmad',
                'program_studi' => 'Teknik Robotika',
                'judul_prestasi' => 'Gold Medal International Robotics Competition 2024',
                'tingkat' => 'internasional',
                'tahun' => 2024,
                'deskripsi' => 'Tim robotika universitas meraih medali emas dalam kompetisi robotika internasional dengan menciptakan robot autonomous yang dapat melakukan rescue mission dengan tingkat akurasi 98%.',
                'gambar' => 'prestasi/wro-robotics-2024.jpg'
            ]
        ];

        foreach ($prestasis as $prestasi) {
            Prestasi::create($prestasi);
        }
    }
}