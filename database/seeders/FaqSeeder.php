<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'pertanyaan' => 'Bagaimana cara mendaftar sebagai mahasiswa baru?',
                'jawaban' => '<p>Pendaftaran mahasiswa baru dapat dilakukan melalui beberapa jalur:</p><ol><li><strong>Jalur SNBP (Seleksi Nasional Berdasarkan Prestasi)</strong> - melalui portal SNPMB</li><li><strong>Jalur SNBT (Seleksi Nasional Berdasarkan Tes)</strong> - mengikuti UTBK</li><li><strong>Jalur Mandiri</strong> - mendaftar langsung melalui website universitas</li></ol>'
            ],
            [
                'pertanyaan' => 'Berapa biaya kuliah untuk tahun akademik 2024/2025?',
                'jawaban' => '<p>Biaya kuliah bervariasi berdasarkan program studi dan jalur masuk:</p><ul><li>Teknik Informatika: Rp 8.500.000 - Rp 12.000.000</li><li>Manajemen: Rp 7.500.000 - Rp 10.500.000</li><li>Kedokteran: Rp 15.000.000 - Rp 25.000.000</li><li>Hukum: Rp 7.000.000 - Rp 9.500.000</li></ul>'
            ],
            [
                'pertanyaan' => 'Apa saja program beasiswa yang tersedia?',
                'jawaban' => '<p>Universitas menyediakan berbagai program beasiswa:</p><h4>Beasiswa Internal:</h4><ul><li><strong>Beasiswa Prestasi Akademik</strong> - untuk mahasiswa dengan IPK ≥ 3.5</li><li><strong>Beasiswa Bantuan Ekonomi</strong> - untuk mahasiswa kurang mampu</li><li><strong>Beasiswa Atlet</strong> - untuk mahasiswa berprestasi olahraga</li></ul>'
            ],
            [
                'pertanyaan' => 'Bagaimana sistem pembelajaran di universitas?',
                'jawaban' => '<p>Sistem pembelajaran menggunakan pendekatan hybrid modern:</p><ul><li><strong>Tatap Muka</strong> - 70% perkuliahan di kelas</li><li><strong>Online Learning</strong> - 30% melalui platform LMS</li><li><strong>Praktikum</strong> - di laboratorium modern</li><li><strong>Project-Based Learning</strong> - kolaborasi dengan industri</li></ul>'
            ],
            [
                'pertanyaan' => 'Apakah tersedia program magang dan job placement?',
                'jawaban' => '<p>Ya, universitas memiliki program Career Development yang komprehensif:</p><ul><li><strong>Magang Wajib</strong> - minimal 6 bulan untuk semua mahasiswa</li><li><strong>International Internship</strong> - kesempatan magang di luar negeri</li><li><strong>Job Fair</strong> - dengan 200+ perusahaan multinasional</li><li><strong>Tingkat penempatan kerja:</strong> 85% dalam 6 bulan setelah lulus</li></ul>'
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}