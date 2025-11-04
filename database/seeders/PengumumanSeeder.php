<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengumuman;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengumumans = [
            [
                'judul' => 'Pengumuman Hasil Seleksi Beasiswa Unggulan 2024',
                'isi' => '<p>Dengan ini disampaikan hasil seleksi Beasiswa Unggulan Tahun 2024. Setelah melalui proses seleksi yang ketat meliputi seleksi administrasi, tes tertulis, dan wawancara, berikut adalah daftar mahasiswa yang lolos:</p><p><strong>Penerima Beasiswa Unggulan 2024:</strong></p><ol><li>Ahmad Rizky Pratama - Teknik Informatika</li><li>Sari Dewi Permata - Manajemen</li><li>Budi Santoso - Teknik Sipil</li><li>Maya Indah Sari - Psikologi</li><li>Deva Pratama - Sistem Informasi</li></ol>',
                'kategori' => 'Beasiswa',
                'tanggal' => '2024-11-01'
            ],
            [
                'judul' => 'Jadwal Ujian Tengah Semester (UTS) Gasal 2024/2025',
                'isi' => '<p>Berdasarkan Kalender Akademik Tahun 2024/2025, dengan ini disampaikan jadwal pelaksanaan Ujian Tengah Semester (UTS) Semester Gasal:</p><p><strong>Periode UTS:</strong> 25 November - 7 Desember 2024</p><p><strong>Ketentuan Ujian:</strong></p><ul><li>Mahasiswa wajib hadir 15 menit sebelum ujian dimulai</li><li>Membawa Kartu Tanda Mahasiswa (KTM) asli</li><li>Menggunakan alat tulis yang diizinkan</li></ul>',
                'kategori' => 'Akademik',
                'tanggal' => '2024-10-20'
            ],
            [
                'judul' => 'Pembukaan Pendaftaran Organisasi Mahasiswa Periode 2024/2025',
                'isi' => '<p>Dibuka kesempatan bagi mahasiswa untuk bergabung dengan berbagai Organisasi Mahasiswa (Ormawa) periode 2024/2025. Kegiatan organisasi mahasiswa merupakan bagian penting dari pengembangan soft skill dan leadership.</p><p><strong>Organisasi yang membuka pendaftaran:</strong></p><ul><li>Badan Eksekutif Mahasiswa (BEM)</li><li>Himpunan Mahasiswa per Program Studi</li><li>Unit Kegiatan Mahasiswa (UKM)</li></ul>',
                'kategori' => 'Kemahasiswaan',
                'tanggal' => '2024-11-01'
            ],
            [
                'judul' => 'Pelaksanaan Wisuda Periode II Tahun 2024',
                'isi' => '<p>Dengan bangga kami mengumumkan pelaksanaan Wisuda Periode II Tahun 2024 untuk para lulusan yang telah menyelesaikan studi dengan baik.</p><p><strong>Detail Acara:</strong></p><ul><li><strong>Tanggal:</strong> Sabtu, 14 Desember 2024</li><li><strong>Waktu:</strong> 08.00 - 12.00 WIB</li><li><strong>Tempat:</strong> Aula Utama Universitas</li><li><strong>Dress Code:</strong> Toga akademik lengkap</li></ul>',
                'kategori' => 'Akademik',
                'tanggal' => '2024-10-25'
            ]
        ];

        foreach ($pengumumans as $pengumuman) {
            Pengumuman::create($pengumuman);
        }
    }
}