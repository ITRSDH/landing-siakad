<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'Universitas Raih Akreditasi A dari BAN-PT',
                'isi' => '<p>Universitas kami dengan bangga mengumumkan pencapaian akreditasi A dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) untuk periode 2024-2029. Pencapaian ini merupakan hasil dari komitmen berkelanjutan dalam meningkatkan kualitas pendidikan, penelitian, dan pengabdian masyarakat.</p><p>Rektor menyampaikan bahwa akreditasi A ini menjadi bukti bahwa universitas telah memenuhi standar nasional pendidikan tinggi dengan excellent. Hal ini juga menunjukkan bahwa lulusan universitas memiliki kompetensi yang diakui secara nasional.</p>',
                'kategori' => 'Akademik',
                'gambar' => 'berita/akreditasi-a.jpg',
                'tanggal' => '2024-10-15'
            ],
            [
                'judul' => 'Mahasiswa Juara 1 Kompetisi Startup Nasional',
                'isi' => '<p>Tim mahasiswa dari Program Studi Teknik Informatika berhasil meraih juara 1 dalam Kompetisi Startup Nasional 2024 yang diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan. Tim yang beranggotakan 4 mahasiswa ini mengembangkan aplikasi "EduTech Learning" yang memberikan solusi pembelajaran adaptif untuk pendidikan dasar.</p><p>Aplikasi EduTech Learning menggunakan teknologi artificial intelligence untuk menyesuaikan metode pembelajaran sesuai dengan gaya belajar setiap siswa. Inovasi ini dinilai dapat meningkatkan efektivitas pembelajaran hingga 40% berdasarkan hasil testing yang dilakukan.</p>',
                'kategori' => 'Prestasi',
                'gambar' => 'berita/juara-startup.jpg',
                'tanggal' => '2024-10-20'
            ],
            [
                'judul' => 'Pembukaan Program Beasiswa Unggulan 2025',
                'isi' => '<p>Universitas membuka pendaftaran Program Beasiswa Unggulan 2025 untuk mahasiswa berprestasi dari seluruh Indonesia. Program ini menyediakan 200 slot beasiswa penuh yang mencakup biaya kuliah, biaya hidup, dan program pengembangan kepemimpinan.</p><p>Program Beasiswa Unggulan dirancang untuk menghasilkan lulusan yang tidak hanya unggul secara akademik, tetapi juga memiliki jiwa kepemimpinan dan kontribusi nyata bagi masyarakat.</p>',
                'kategori' => 'Beasiswa',
                'gambar' => 'berita/beasiswa-unggulan.jpg',
                'tanggal' => '2024-11-01'
            ],
            [
                'judul' => 'Kerjasama Internasional dengan University of Melbourne',
                'isi' => '<p>Universitas menandatangani Memorandum of Understanding (MoU) dengan University of Melbourne, Australia, untuk program pertukaran mahasiswa dan kerjasama penelitian. Kerjasama ini akan memberikan kesempatan bagi mahasiswa untuk mengikuti program double degree dan summer course di Australia.</p><p>Program kerjasama ini mencakup berbagai bidang studi seperti Engineering, Business, Computer Science, dan Environmental Science.</p>',
                'kategori' => 'Internasional',
                'gambar' => 'berita/kerjasama-melbourne.jpg',
                'tanggal' => '2024-10-25'
            ],
            [
                'judul' => 'Festival Sains dan Teknologi 2024',
                'isi' => '<p>Universitas akan menggelar Festival Sains dan Teknologi 2024 pada tanggal 15-17 Desember 2024 di kompleks kampus utama. Festival ini menghadirkan pameran inovasi teknologi, kompetisi robotika, workshop coding, dan seminar nasional dengan pembicara dari berbagai universitas terkemuka dan industri teknologi.</p><p>Festival Sains dan Teknologi merupakan event tahunan yang bertujuan untuk memperkenalkan perkembangan terbaru dalam dunia sains dan teknologi kepada masyarakat umum, khususnya generasi muda.</p>',
                'kategori' => 'Event',
                'gambar' => 'berita/festival-saintek.jpg',
                'tanggal' => '2024-10-30'
            ]
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}