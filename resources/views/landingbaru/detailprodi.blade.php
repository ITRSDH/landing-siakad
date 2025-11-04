@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Detail Prodi -->
<div class="bg-gradient-to-br from-[#003366] to-[#001f4d] text-white text-center py-20 md:py-28 px-4 rounded-b-3xl shadow-lg">
    <h1 class="text-4xl md:text-5xl font-bold my-3 tracking-wide">Detail Program Studi</h1>
    <p class="text-lg opacity-90 max-w-2xl mx-auto">Informasi Lengkap Program Studi yang Anda Pilih</p>
</div>

<!-- Detail Section -->
<div class="max-w-5xl mx-auto py-16 px-6">
    <h2 class="text-3xl font-bold text-[#003366] mb-6">Program Studi Teknik Informatika</h2>
    <p class="text-gray-600 leading-relaxed mb-8">
        Program Studi Teknik Informatika berfokus pada pengembangan kompetensi di bidang pemrograman, 
        kecerdasan buatan, sistem informasi, keamanan siber, serta rekayasa perangkat lunak. 
        Dengan kurikulum berbasis industri, mahasiswa dipersiapkan menjadi profesional teknologi masa depan.
    </p>

    <!-- Info Grid -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Kurikulum -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-[#003366] mb-3">Kurikulum</h3>
            <ul class="list-disc pl-5 text-gray-600 space-y-2">
                <li>Pemrograman Dasar & Lanjutan</li>
                <li>Kecerdasan Buatan & Data Science</li>
                <li>Jaringan Komputer & Keamanan Siber</li>
                <li>Pengembangan Aplikasi Web & Mobile</li>
            </ul>
        </div>

        <!-- Fasilitas -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-[#003366] mb-3">Fasilitas</h3>
            <ul class="list-disc pl-5 text-gray-600 space-y-2">
                <li>Laboratorium Komputer Modern</li>
                <li>Ruang Belajar Digital</li>
                <li>Akses Jurnal Internasional</li>
                <li>Komunitas Coding & Startup</li>
            </ul>
        </div>
    </div>

    <!-- Prestasi -->
    <div class="mt-12">
        <h3 class="text-2xl font-semibold text-[#003366] mb-4">Prestasi Mahasiswa</h3>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                <p class="font-medium text-gray-700">Juara 1 Hackathon Nasional 2024</p>
                <span class="text-sm text-gray-500">Bidang AI & Machine Learning</span>
            </div>
            <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                <p class="font-medium text-gray-700">Finalis Gemastik 2023</p>
                <span class="text-sm text-gray-500">Kategori Keamanan Siber</span>
            </div>
            <div class="bg-white border border-gray-100 rounded-xl p-5 shadow hover:shadow-lg transition">
                <p class="font-medium text-gray-700">Publikasi Jurnal Internasional</p>
                <span class="text-sm text-gray-500">IEEE & Scopus Indexed</span>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<section
    class="relative bg-cover bg-center text-white py-20 px-6 rounded-3xl max-w-6xl mx-auto mb-20 text-center flex flex-col items-center justify-center shadow-xl"
    style="background-image:linear-gradient(rgba(0,51,102,0.85),rgba(0,31,77,0.85)),url('https://via.placeholder.com/1200x400/003366/ffffff?text=Teknik+Informatika');">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik dengan Program Studi Ini?</h2>
    <p class="text-lg max-w-2xl mx-auto opacity-90">Jadilah bagian dari komunitas teknologi dan inovasi kami.</p>
    <a href="#"
       class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full mt-6 shadow-md hover:bg-yellow-500 hover:scale-105 transform transition">
        Daftar Sekarang
    </a>
</section>

@endsection
