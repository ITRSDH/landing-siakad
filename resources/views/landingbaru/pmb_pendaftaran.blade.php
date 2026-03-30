@extends("landingbaru.layout.appbranda")

@section('content')

@php
    $pmb = isset($pmbPendaftaran) ? ensure_pmb_object($pmbPendaftaran) : null;
    $tataCara = $pmb->tata_cara ?? $pmb->title ?? 'PMB Pendaftaran';
    $deskripsi = $pmb->deskripsi ?? $pmb->description ?? null;
@endphp

<section class="relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1480&auto=format&fit=crop" alt="PMB" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-950/90 via-blue-900/80 to-gray-950/70"></div>
    </div>
    <div class="relative py-20 md:py-28">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl">
                <p class="inline-flex items-center gap-2 text-blue-100/90 text-sm font-medium bg-white/10 border border-white/10 px-4 py-2 rounded-full">
                    Informasi PMB
                </p>
                <h1 class="text-3xl md:text-5xl font-bold text-white mt-4">PMB Pendaftaran</h1>
                <p class="text-base md:text-lg text-blue-100 max-w-2xl mt-4">
                    Informasi dan tata cara pendaftaran mahasiswa baru
                </p>

                <div class="flex flex-col sm:flex-row gap-3 mt-8">
                    <a href="#panduan" class="inline-flex items-center justify-center bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                        Lihat Panduan
                    </a>
                    <a href="/kontakbaru" class="inline-flex items-center justify-center bg-white/10 text-white px-5 py-3 rounded-xl font-semibold border border-white/15 hover:bg-white/15 transition">
                        Hubungi Admin
                    </a>
                </div>

                <nav class="flex flex-wrap items-center text-sm mt-8 gap-2 text-blue-200">
                    <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
                    <span>/</span>
                    <span>PMB Pendaftaran</span>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-50" id="panduan">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div class="lg:col-span-8">
                <div class="bg-white border border-gray-200 rounded-2xl p-6 md:p-8 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Tata Cara Pendaftaran</h2>
                            <p class="text-gray-600 mt-2">Ikuti panduan berikut untuk menyelesaikan pendaftaran.</p>
                            
                            <div class="mt-6 space-y-6">
                                @php
                                    // Format tataCara untuk menampilkan daftar bernomor dengan rapi
                                    $lines = explode("\n", $tataCara);
                                    $currentSection = '';
                                    $currentItems = [];
                                @endphp
                                
                                @php
                                    foreach($lines as $line) {
                                        $line = trim($line);
                                        // Cek apakah ini adalah judul section (dimulai dengan angka dan titik)
                                        if (preg_match('/^\d+\.\s*(.+)$/', $line, $matches)) {
                                            // Jika ada section sebelumnya, tampilkan dulu
                                            if (!empty($currentSection)) {
                                                echo '<div class="bg-blue-50 border border-blue-200 rounded-xl p-6">';
                                                echo '<h3 class="text-lg font-bold text-blue-900 mb-3">' . e($currentSection) . '</h3>';
                                                if (!empty($currentItems)) {
                                                    echo '<ul class="space-y-2">';
                                                    foreach ($currentItems as $item) {
                                                        echo '<li class="flex items-start">';
                                                        echo '<svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">';
                                                        echo '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>';
                                                        echo '</svg>';
                                                        echo '<span class="text-gray-700">' . e($item) . '</span>';
                                                        echo '</li>';
                                                    }
                                                    echo '</ul>';
                                                }
                                                echo '</div>';
                                            }
                                            $currentSection = $matches[1];
                                            $currentItems = [];
                                        }
                                        // Cek apakah ini adalah item dalam section (dimulai dengan -)
                                        elseif (preg_match('/^-\s*(.+)$/', $line, $matches)) {
                                            $currentItems[] = $matches[1];
                                        }
                                    }
                                @endphp
                                
                                @php
                                    // Tampilkan section terakhir
                                    if (!empty($currentSection)) {
                                        echo '<div class="bg-blue-50 border border-blue-200 rounded-xl p-6">';
                                        echo '<h3 class="text-lg font-bold text-blue-900 mb-3">' . e($currentSection) . '</h3>';
                                        if (!empty($currentItems)) {
                                            echo '<ul class="space-y-2">';
                                            foreach ($currentItems as $item) {
                                                echo '<li class="flex items-start">';
                                                echo '<svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">';
                                                echo '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>';
                                                echo '</svg>';
                                                echo '<span class="text-gray-700">' . e($item) . '</span>';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                        }
                                        echo '</div>';
                                    }
                                @endphp
                            </div>
                        </div>
                        <a href="/kontakbaru" class="hidden md:inline-flex items-center justify-center text-sm font-semibold text-blue-700 bg-blue-50 px-4 py-2 rounded-xl hover:bg-blue-100 transition">
                            Butuh bantuan?
                        </a>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Deskripsi</h2>
                        @if(!empty($deskripsi))
                            <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
                                {!! $deskripsi !!}
                            </div>
                        @else
                            <p class="text-gray-500">Konten PMB Pendaftaran belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm sticky top-24">
                    <h3 class="text-lg font-bold text-gray-900">Ringkasan</h3>
                    <p class="text-sm text-gray-600 mt-1">Akses cepat untuk calon mahasiswa baru.</p>

                    <div class="mt-5 space-y-3">
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500">Halaman</p>
                            <p class="font-semibold text-gray-900">PMB Pendaftaran</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500">Navigasi</p>
                            <a href="#panduan" class="font-semibold text-blue-700 hover:text-blue-800 transition">Lihat Panduan</a>
                        </div>
                        <div class="bg-blue-600 rounded-xl p-4 text-white">
                            <p class="text-xs text-white/80">Kontak</p>
                            <a href="/kontakbaru" class="font-semibold hover:underline">Hubungi Admin</a>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="/kontakbaru" class="w-full inline-flex items-center justify-center bg-gray-900 text-white px-4 py-3 rounded-xl font-semibold hover:bg-black transition">
                            Konsultasi Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
