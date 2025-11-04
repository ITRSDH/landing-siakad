@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Detail Berita -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('{{ asset($berita->gambar ?? $berita->image ?? 'https://picsum.photos/1600/500') }}');">
    
    <div class="absolute inset-0 bg-blue-900/70"></div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $berita->judul ?? $berita->title ?? 'Judul tidak tersedia' }}</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            {{ $berita->kategori ?? $berita->category ?? 'Artikel Kampus' }}
        </p>
    </div>
</section>

<!-- Konten Detail Berita -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-2xl shadow p-8">
            <div class="flex flex-wrap items-center gap-3 text-sm mb-6">
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">
                    {{ $berita->kategori ?? $berita->category ?? 'Umum' }}
                </span>
                <span class="text-gray-500">
                    @if(isset($berita->tanggal))
                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                    @elseif(isset($berita->date))
                        {{ \Carbon\Carbon::parse($berita->date)->translatedFormat('d F Y') }}
                    @elseif(isset($berita->created_at))
                        {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                    @else
                        {{ date('d F Y') }}
                    @endif
                </span>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">
                    Dipublikasikan
                </span>
            </div>

            {{-- @if($berita->gambar ?? $berita->image)
                <img src="{{ asset($berita->gambar ?? $berita->image) }}" 
                     alt="{{ $berita->judul ?? $berita->title ?? 'Berita' }}" 
                     class="w-full h-64 object-cover rounded-lg mb-6">
            @endif --}}

            <img src="https://picsum.photos/960/540?random={{ $berita->id }}" 
                     alt="{{ $berita->judul ?? $berita->title ?? 'Berita' }}" 
                     class="w-full h-64 object-cover rounded-lg mb-6">

            <div class="prose max-w-full text-gray-700 mb-6">
                {!! $berita->isi ?? $berita->content ?? 'Konten tidak tersedia' !!}
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('landing.berita') }}"
                   class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full shadow hover:bg-yellow-500 hover:scale-105 transform transition">
                    Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
