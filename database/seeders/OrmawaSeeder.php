<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ormawa;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ormawas = [
            [
                'nama' => 'Badan Eksekutif Mahasiswa (BEM)',
                'kategori' => 'Pemerintahan',
                'deskripsi' => 'Badan Eksekutif Mahasiswa (BEM) adalah organisasi tertinggi yang mewakili seluruh mahasiswa universitas. BEM bertugas sebagai jembatan komunikasi antara mahasiswa dengan pihak universitas dan berperan aktif dalam menyuarakan aspirasi mahasiswa.',
                'gambar' => 'ormawa/logo-bem.png',
                'jumlah_anggota' => 25
            ],
            [
                'nama' => 'Himpunan Mahasiswa Teknik Informatika (HIMATIF)',
                'kategori' => 'Himpunan',
                'deskripsi' => 'HIMATIF adalah organisasi yang menaungi mahasiswa Program Studi Teknik Informatika. Organisasi ini fokus pada pengembangan skills teknis, soft skills, dan networking di bidang teknologi informasi.',
                'gambar' => 'ormawa/logo-himatif.png',
                'jumlah_anggota' => 80
            ],
            [
                'nama' => 'Unit Kegiatan Mahasiswa Paduan Suara (UKM PS)',
                'kategori' => 'Seni',
                'deskripsi' => 'UKM Paduan Suara adalah wadah bagi mahasiswa yang memiliki bakat dan minat di bidang musik vokal. UKM ini secara rutin mengadakan latihan dan pertunjukan baik di dalam maupun luar kampus.',
                'gambar' => 'ormawa/logo-ukm-ps.png',
                'jumlah_anggota' => 40
            ],
            [
                'nama' => 'Unit Kegiatan Mahasiswa Basket (UKM Basket)',
                'kategori' => 'Olahraga',
                'deskripsi' => 'UKM Basket adalah wadah bagi mahasiswa yang memiliki passion di bidang olahraga basket. UKM ini tidak hanya fokus pada prestasi olahraga, tetapi juga pengembangan karakter dan sportivitas.',
                'gambar' => 'ormawa/logo-ukm-basket.png',
                'jumlah_anggota' => 30
            ],
            [
                'nama' => 'Rohani Islam (ROHIS)',
                'kategori' => 'Keagamaan',
                'deskripsi' => 'ROHIS adalah organisasi yang menaungi kegiatan keagamaan Islam di kampus. Organisasi ini berperan dalam pembinaan spiritual, pendidikan agama, dan kegiatan sosial keagamaan untuk mahasiswa muslim.',
                'gambar' => 'ormawa/logo-rohis.png',
                'jumlah_anggota' => 60
            ],
            [
                'nama' => 'Unit Kegiatan Mahasiswa Volunteer (UKM Volunteer)',
                'kategori' => 'Sosial',
                'deskripsi' => 'UKM Volunteer adalah organisasi yang fokus pada kegiatan sosial dan pengabdian masyarakat. Anggota UKM ini secara aktif terlibat dalam berbagai program kemanusiaan dan pemberdayaan masyarakat.',
                'gambar' => 'ormawa/logo-ukm-volunteer.png',
                'jumlah_anggota' => 50
            ]
        ];

        foreach ($ormawas as $ormawa) {
            Ormawa::create($ormawa);
        }
    }
}