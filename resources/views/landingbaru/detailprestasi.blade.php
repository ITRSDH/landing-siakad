@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Detail Prestasi -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('{{ asset($prestasi->gambar ?? $prestasi->image ?? 'images/default-achievement.jpg') }}');">
    
    <div class="absolute inset-0 bg-blue-900/70"></div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $prestasi->judul_prestasi ?? $prestasi->title ?? 'Judul tidak tersedia' }}</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Prestasi mahasiswa di tingkat {{ strtolower($prestasi->tingkat ?? $prestasi->level ?? 'kampus') }}
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="/prestasibaru" class="hover:underline hover:text-white transition">Prestasi</a>
            <span>/</span>
            <span>{{ $prestasi->judul_prestasi ?? $prestasi->title ?? 'Detail' }}</span>
        </nav>
    </div>
</section>

<!-- Detail Prestasi -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-2xl shadow p-8">

            <h2 class="text-2xl font-bold text-[#003366] mb-4">Informasi Mahasiswa</h2>
            <ul class="list-disc pl-5 text-gray-600 mb-6 space-y-2">
                <li>Nama: <span class="font-medium">{{ $prestasi->nama_mahasiswa ?? $prestasi->student_name ?? 'Nama tidak tersedia' }}</span></li>
                <li>Program Studi: {{ $prestasi->prodi->nama_prodi ?? $prestasi->study_program ?? 'Program Studi tidak tersedia' }}</li>
                <li>Tahun Prestasi: {{ $prestasi->tahun ?? $prestasi->year ?? 'Tahun tidak tersedia' }}</li>
                <li>Tingkat: {{ $prestasi->tingkat ?? $prestasi->level ?? 'Tingkat tidak tersedia' }}</li>
            </ul>

            <h3 class="text-xl font-semibold text-[#003366] mb-3">Deskripsi Prestasi</h3>
            <p class="text-gray-600 mb-6 leading-relaxed">
                {{ $prestasi->deskripsi ?? $prestasi->description ?? 'Deskripsi tidak tersedia' }}
            </p>

            <div class="text-center mt-8">
                <a href="/prestasibaru"
                   class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full shadow hover:bg-yellow-500 hover:scale-105 transform transition">
                    Kembali ke Daftar Prestasi
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
