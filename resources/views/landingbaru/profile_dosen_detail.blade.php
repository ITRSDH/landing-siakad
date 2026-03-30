@extends("landingbaru.layout.appbranda")

@section('content')

@php
    $d = isset($dosen) ? ensure_profile_dosen_object($dosen) : null;
    $p = isset($prodi) && $prodi && $prodi->count() > 0 ? ensure_profile_dosen_object($prodi->first()) : null;
    $foto = $d->foto ?? null;
    $nama = $d->nama ?? '-';
@endphp

<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1480&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Detail Profile Dosen</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">Informasi lengkap dosen</p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('landing.profiledosen') }}" class="hover:underline hover:text-white transition">Profile Dosen</a>
            <span>/</span>
            <span>Detail</span>
        </nav>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 mx-auto">
                        @if(!empty($foto))
                            <img src="{{ config('app.api_storage') . $foto }}" alt="{{ $nama }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">No Photo</div>
                        @endif
                    </div>

                    <div class="text-center mt-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $nama }}</h2>
                        @if(!empty($d?->nidn))
                            <p class="text-sm text-gray-500 mt-1">NIDN: {{ $d->nidn }}</p>
                        @endif
                        @if(!empty($d?->status))
                            <p class="text-sm text-blue-700 mt-1">{{ $d->status }}</p>
                        @endif
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('landing.profiledosen') }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition">← Kembali</a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Biografi</h3>
                    @if(!empty($d?->biografi))
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($d->biografi)) !!}
                        </div>
                    @else
                        <p class="text-gray-500">Biografi belum tersedia.</p>
                    @endif
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Program Studi</h3>
                    @if(!empty($p))
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-500">Nama Prodi</p>
                                <p class="font-semibold text-gray-800">{{ $p->nama_prodi ?? '-' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-500">Kode Prodi</p>
                                <p class="font-semibold text-gray-800">{{ $p->kode_prodi ?? '-' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-500">Akreditasi</p>
                                <p class="font-semibold text-gray-800">{{ $p->akreditasi ?? '-' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-500">Tahun Berdiri</p>
                                <p class="font-semibold text-gray-800">{{ $p->tahun_berdiri ?? '-' }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500">Data prodi belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
