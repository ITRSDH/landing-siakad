<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LandingContent;

class LandingContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $landingContent = [
            'hero_title' => 'STIKES Dian Husada - Terdepan dalam Pendidikan Kesehatan',
            'hero_subtitle' => 'Mencetak tenaga kesehatan profesional yang kompeten dan berintegritas melalui pendidikan berkualitas, penelitian inovatif, dan pengabdian masyarakat yang berkelanjutan.',
            'hero_background' => 'images/hero-bg.jpg',
            'jumlah_program_studi' => 8,
            'jumlah_mahasiswa' => 2500,
            'jumlah_dosen' => 120,
            'jumlah_mitra' => 85,
            'keunggulan' => 'Kurikulum berbasis kompetensi sesuai standar profesi kesehatan, Dosen berpengalaman dengan kualifikasi S2 dan S3, Laboratorium praktikum lengkap dan modern, Kerjasama dengan rumah sakit dan puskesmas, Program magang dan penempatan kerja di fasilitas kesehatan',
            'logo' => 'images/logo-stikes.png',
            'nama_aplikasi' => 'STIKES Dian Husada Portal',
            'deskripsi_footer' => 'Sekolah Tinggi Ilmu Kesehatan (STIKES) Dian Husada adalah institusi pendidikan tinggi kesehatan yang berkomitmen menghasilkan tenaga kesehatan profesional yang kompeten dan berintegritas.',
            'facebook' => 'https://facebook.com/stikesdianhusada',
            'twitter' => 'https://twitter.com/stikes_dh',
            'instagram' => 'https://instagram.com/stikesdianhusada',
            'linkedin' => 'https://linkedin.com/school/stikes-dian-husada',
            'youtube' => 'https://youtube.com/c/STIKESDianHusada',
            'alamat' => 'Jl. Kesehatan Raya No. 45, Dukuh Pakis, Surabaya 60225',
            'telepon' => '031-5678901',
            'email' => 'info@stikesdianhusada.ac.id'
        ];

        LandingContent::create($landingContent);
    }
}
