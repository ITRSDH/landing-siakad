@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Section -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1600&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Sertifikat Akreditasi</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Informasi sertifikat akreditasi kampus
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Sertifikat Akreditasi</span>
        </nav>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 text-center sm:text-left">Daftar Sertifikat</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($sertifikatAkreditasi as $itemRaw)
                @php
                    $item = ensure_sertifikat_akreditasi_object($itemRaw);
                    $judul = $item->nama ?? $item->name ?? 'Sertifikat';
                    $deskripsi = $item->deskripsi ?? $item->description ?? null;
                    $foto = $item->foto_sertifikat ?? $item->gambar ?? $item->logo ?? null;
                @endphp

                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition duration-300">
                    <div class="relative">
                        @if(!empty($foto))
                            <img src="{{ config('app.api_storage') . $foto }}" alt="{{ $judul }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">No Image</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $judul }}</h3>
                        @if(!empty($deskripsi))
                            <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($deskripsi), 120) }}</p>
                        @else
                            <p class="text-sm text-gray-500">Deskripsi belum tersedia.</p>
                        @endif

                        @if(!empty($item->id))
                            <div class="mt-4">
                                <a href="{{ route('landing.sertifikat_akreditasi.detail', $item->id) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">Lihat Detail →</a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3">
                    <p class="text-center text-gray-500">Belum ada data sertifikat akreditasi.</p>
                </div>
            @endforelse
        </div>

        @if(method_exists($sertifikatAkreditasi, 'links'))
            <div class="mt-10">
                {{ $sertifikatAkreditasi->links() }}
            </div>
        @endif
    </div>
</section>

@endsection
