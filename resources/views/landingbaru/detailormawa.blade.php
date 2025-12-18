@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Detail Ormawa -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('{{ $ormawa->gambar ? config('app.api_storage') . $ormawa->gambar : 'https://picsum.photos/1200/600?random=' . $ormawa->id }}');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $ormawa->nama }}</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            {{ $ormawa->kategori }} — {{ $ormawa->jumlah_anggota }} anggota aktif
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="/ormawa" class="hover:underline hover:text-white transition">Organisasi</a>
            <span>/</span>
            <span>{{ $ormawa->nama }}</span>
        </nav>
    </div>
</section>

<!-- Detail Info -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-2xl font-bold text-[#003366] mb-4">Profil Organisasi</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">{{ $ormawa->deskripsi }}</p>

            <h3 class="text-xl font-semibold text-[#003366] mb-3">Informasi Umum</h3>
            <ul class="list-disc pl-5 text-gray-600 mb-6 space-y-2">
                <li>Kategori: {{ ucfirst($ormawa->kategori) }}</li>
                <li>Jumlah Anggota: {{ $ormawa->jumlah_anggota }}</li>
            </ul>

            <div class="text-center mt-8">
                <a href="{{ route('landing.ormawa') }}"
                   class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full shadow hover:bg-yellow-500 hover:scale-105 transform transition">
                    Kembali ke Daftar Organisasi
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
