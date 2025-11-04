<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilKampus;

class ProfilKampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profilKampus = [
            [
                'judul' => 'Profil STIKES Dian Husada',
                'deskripsi' => '<p><strong>Sekolah Tinggi Ilmu Kesehatan (STIKES) Dian Husada</strong> adalah institusi pendidikan tinggi kesehatan yang didirikan pada tahun 1990 dengan komitmen menghasilkan tenaga kesehatan profesional yang kompeten dan berintegritas.</p><p><strong>Data Institusi:</strong></p><ul><li><strong>Nama:</strong> Sekolah Tinggi Ilmu Kesehatan Dian Husada</li><li><strong>Singkatan:</strong> STIKES Dian Husada</li><li><strong>Alamat:</strong> Jl. Kesehatan Raya No. 45, Dukuh Pakis, Surabaya 60225</li><li><strong>Telepon:</strong> 031-5678901</li><li><strong>Email:</strong> info@stikesdianhusada.ac.id</li><li><strong>Website:</strong> https://www.stikesdianhusada.ac.id</li><li><strong>Tahun Berdiri:</strong> 1990</li><li><strong>Akreditasi:</strong> B (Baik Sekali)</li></ul><p><strong>Sejarah Singkat:</strong></p><p>STIKES Dian Husada didirikan pada tahun 1990 dengan visi menjadi institusi pendidikan tinggi kesehatan yang unggul di Jawa Timur. Berawal dari akademi keperawatan dengan 1 program studi, kini STIKES Dian Husada telah berkembang dengan 8 program studi kesehatan yang terakreditasi.</p><p><strong>Tonggak Sejarah Penting:</strong></p><ul><li><strong>1990:</strong> Pendirian sebagai Akademi Keperawatan Dian Husada</li><li><strong>1998:</strong> Upgrade status menjadi Sekolah Tinggi Ilmu Kesehatan</li><li><strong>2005:</strong> Pembukaan program studi Kebidanan</li><li><strong>2012:</strong> Meraih akreditasi B untuk semua program studi</li><li><strong>2018:</strong> Pembukaan program studi Farmasi dan Gizi</li><li><strong>2023:</strong> Implementasi sistem pembelajaran digital dan telemedicine</li></ul><p><strong>Statistik Terkini:</strong></p><ul><li>Mahasiswa Aktif: 2.500 orang</li><li>Dosen & Staff: 120 orang</li><li>Program Studi: 8 program</li><li>Jurusan: 4 jurusan</li><li>Alumni: 12.000+ lulusan</li></ul>',
                'visi' => 'Menjadi institusi pendidikan tinggi kesehatan yang unggul, menghasilkan tenaga kesehatan profesional yang kompeten, berintegritas, dan berdaya saing nasional untuk meningkatkan derajat kesehatan masyarakat.',
                'misi' => 'Menyelenggarakan pendidikan tinggi kesehatan berkualitas yang berorientasi pada kebutuhan masyarakat dan standar profesi kesehatan; Melaksanakan penelitian di bidang kesehatan yang inovatif dan bermanfaat bagi pengembangan ilmu pengetahuan dan teknologi kesehatan; Melakukan pengabdian kepada masyarakat dalam bidang kesehatan yang berkelanjutan dan berdampak positif; Menjalin kerjasama strategis dengan rumah sakit, puskesmas, dan institusi kesehatan lainnya baik domestik maupun internasional; Mengembangkan tata kelola institusi yang profesional, transparan, dan akuntabel sesuai dengan nilai-nilai islami.',
                'struktur_image' => 'struktur/struktur-organisasi-2024.jpg',
                'fasilitas' => '{"gedung": ["Gedung Utama 6 lantai", "Gedung Laboratorium Terpadu", "Gedung Perpustakaan dan E-Learning", "Gedung Aula dan Kemahasiswaan"], "laboratorium": ["Lab Keperawatan Dasar", "Lab Keperawatan Medikal Bedah", "Lab Keperawatan Anak dan Maternitas", "Lab Kebidanan", "Lab Farmasi dan Kimia", "Lab Gizi dan Dietetik", "Lab Komputer dan Multimedia", "Lab Bahasa"], "fasilitas_umum": ["Aula Utama (500 kursi)", "Masjid Kampus", "Cafeteria", "Ruang Konseling", "Klinik Kesehatan", "Lapangan Olahraga"], "fasilitas_praktik": ["Rumah Sakit Simulasi", "Phantom dan Manikin Lengkap", "Ruang ICU Simulasi", "Ruang Bersalin Simulasi", "Apotek Simulasi"], "teknologi": ["WiFi Campus-wide", "E-Learning Platform", "Digital Library", "Telemedicine Lab", "Smart Classroom"], "transportasi": ["Shuttle Bus untuk Praktik Klinik", "Parkir Motor (800 slot)", "Parkir Mobil (200 slot)"], "asrama": ["Asrama Putri (300 kamar)", "Asrama Putra (200 kamar)", "Guest House untuk Dosen Tamu"]}' 
            ]
        ];

        foreach ($profilKampus as $profil) {
            ProfilKampus::create($profil);
        }
    }
}
