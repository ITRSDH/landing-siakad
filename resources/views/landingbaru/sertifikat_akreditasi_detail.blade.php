@extends("landingbaru.layout.appbranda")

@section('content')

@php
    $item = isset($sertifikat) 
        ? ensure_sertifikat_akreditasi_object($sertifikat) 
        : null;

    $judul = $item->nama ?? 'Sertifikat Akreditasi';

    $deskripsi = $item->deskripsi ?? null;

    $fotos = $item->fotos ?? [];
@endphp

<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1600&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Detail Sertifikat Akreditasi</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">Informasi sertifikat akreditasi</p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('landing.sertifikat_akreditasi') }}" class="hover:underline hover:text-white transition">Sertifikat Akreditasi</a>
            <span>/</span>
            <span>Detail</span>
        </nav>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                <div class="relative">
                    @if(count($fotos) > 0)
                        @foreach($fotos as $foto)
                            <img 
                                src="{{ config('app.api_storage') . $foto->foto }}"
                                alt="{{ $judul }}"
                                class="w-full h-80 md:h-[28rem] object-contain bg-gray-50 mb-4"
                            >
                        @endforeach
                    @else
                        <div class="w-full h-80 md:h-[28rem] bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                            No Image
                        </div>
                    @endif
                </div>

                <div class="p-6 md:p-8">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $judul }}</h2>
                        </div>
                        <div>
                            <a href="{{ route('landing.sertifikat_akreditasi') }}" class="inline-flex items-center justify-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                        @if(!empty($deskripsi))
                            <div class="prose max-w-none text-gray-700 leading-relaxed">
                                {!! $deskripsi !!}
                            </div>
                        @else
                            <p class="text-gray-500">Deskripsi belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>

            @if(empty($item))
                <p class="text-center text-gray-500 mt-6">Data sertifikat tidak ditemukan.</p>
            @endif
        </div>
    </div>
</section>

@endsection
