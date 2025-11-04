@extends("landingbaru.layout.appbranda")

@section('content')

<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('{{ asset($beasiswa->gambar ?? $beasiswa->logo ?? 'images/default-scholarship.jpg') }}');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $beasiswa->nama ?? $beasiswa->name ?? 'Nama tidak tersedia' }}</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Kategori: {{ $beasiswa->kategori ?? 'Tidak disebutkan' }}
        </p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-2xl shadow p-8">
            <h2 class="text-2xl font-bold text-[#003366] mb-4">Deskripsi Beasiswa</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">{{ $beasiswa->deskripsi ?? $beasiswa->description ?? 'Deskripsi tidak tersedia' }}</p>

            <h3 class="text-xl font-semibold text-[#003366] mb-3">Informasi Beasiswa</h3>
            <ul class="list-disc pl-5 text-gray-600 mb-6 space-y-2">
                <li>Kategori: {{ $beasiswa->kategori ?? 'Tidak disebutkan' }}</li>
                <li>Deadline: 
                    @if($beasiswa->deadline ?? false)
                        {{ \Carbon\Carbon::parse($beasiswa->deadline)->format('d M Y') }}
                    @else
                        -
                    @endif
                </li>
                <li>Kuota: {{ $beasiswa->kuota ?? $beasiswa->quota ?? 'Tidak disebutkan' }}</li>
            </ul>

            <div class="text-center mt-8">
                <a href="{{ route('landing.beasiswa') }}"
                   class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full shadow hover:bg-yellow-500 hover:scale-105 transform transition">
                    Kembali ke Daftar Beasiswa
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
