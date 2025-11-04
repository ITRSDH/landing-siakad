@extends('landingbaru.layout.appbranda')

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1920&q=80');">

    <div class="absolute inset-0 bg-blue-900/70"></div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">
            {{ $profil->judul ?? 'Profil Kampus' }}
        </h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Informasi lengkap mengenai {{ config('app.name', 'Universitas Masa Depan') }}
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
        </nav>
    </div>
</section>

<!-- Profil -->
<section class="py-16 bg-gray-50" id="profil">
    <div class="container mx-auto px-4 text-center md:text-left">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Profil</h2>
        <p class="text-gray-700 mb-4">
            {!! nl2br(e($profil->deskripsi ?? 'Belum ada deskripsi kampus.')) !!}
        </p>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-16 bg-white" id="visi-misi">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Visi & Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-2">Visi</h3>
                <p class="text-gray-700">
                    {!! nl2br(e($profil->visi ?? 'Visi belum ditentukan.')) !!}
                </p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Misi</h3>
                <p class="text-gray-700">
                    {!! nl2br(e($profil->misi ?? 'Misi belum ditentukan.')) !!}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi -->
<section class="py-16 bg-gray-50" id="struktur-organisasi">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Struktur Organisasi</h2>
        @if(!empty($profil->struktur_image))
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="{{ asset('storage/' . $profil->struktur_image) }}" alt="Struktur Organisasi" class="rounded-lg shadow-md w-full">
            </div>
        @else
            <p class="text-gray-500 text-center">Belum ada gambar struktur organisasi.</p>
        @endif
    </div>
</section>

<!-- Fasilitas -->
<section class="py-16 bg-white" id="fasilitas">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Fasilitas Kampus</h2>
        <div class="text-gray-700 text-center md:text-left max-w-3xl mx-auto">
            {!! nl2br(e($profil->fasilitas ?? 'Belum ada informasi fasilitas.')) !!}
        </div>
    </div>
</section>
@endsection
