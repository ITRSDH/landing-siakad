@extends("landingbaru.layout.appbranda")

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white bg-cover bg-center min-h-screen"
  style="background-image: url('https://picsum.photos/1920/1080')">

  <!-- Overlay hitam transparan -->
  <div class="absolute inset-0 bg-black opacity-60"></div>

  <div class="container mx-auto px-4 py-32 relative z-10 flex items-center min-h-screen">
    <div class="max-w-3xl">
      <h1 class="text-4xl md:text-6xl font-bold mb-6">
        {{ $hero?->hero_title ?? 'Judul Default' }}
      </h1>
      <p class="text-xl mb-8">{{ $hero?->hero_subtitle ?? 'Subjudul Default' }}</p>
     
      <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <a href="#contact"
          class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
          Hubungi Kami
        </a>
        <a href="https://pmb.alvion.id"
          class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
          Daftar
        </a>
      </div>
    </div>
  </div>
</section>
@php
$jumlahProgram = $hero?->jumlah_program_studi ?? 0;
$jumlahMahasiswa = $hero?->jumlah_mahasiswa ?? 0;
$jumlahDosen = $hero?->jumlah_dosen ?? 0;
$jumlahMitra = $hero?->jumlah_mitra ?? 0;
@endphp
<div class="container relative  mb-12 mx-auto px-4">
  <div class="bg-white rounded-xl p-8 border border-gray-200 mt-12">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center mb-8">
      <div>
        <div class="achievement-counter text-3xl font-bold text-gray-800">{{ $jumlahProgram }}</div>
        <div class="text-gray-500">Program Studi</div>
      </div>
      <div>
        <div class="achievement-counter text-3xl font-bold text-gray-800">{{ $jumlahMahasiswa }}</div>
        <div class="text-gray-500">Mahasiswa Aktif</div>
      </div>
      <div>
        <div class="achievement-counter text-3xl font-bold text-gray-800">{{ $jumlahDosen }}</div>
        <div class="text-gray-500">Dosen Berkualitas</div>
      </div>
      <div>
        <div class="achievement-counter text-3xl font-bold text-gray-800">{{ $jumlahMitra }}</div>
        <div class="text-gray-500">Mitra Industri</div>
      </div>
    </div>

    <!-- Akses Cepat -->
    <div>
      <h4 class="mb-4 text-xl font-semibold text-gray-800 text-center">Akses Cepat</h4>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="https://siakad.alvion.id" class="flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
          Jadwal Kuliah
        </a>
        <a href="https://siakad.alvion.id" class="flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
          Nilai & Transkrip
        </a>
        <a href="https://siakad.alvion.id" class="flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
          Info Pembayaran
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Pengumuman & Kalender Section -->
<section class="py-6">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

      <!-- Pengumuman -->
      <div class="lg:col-span-8">
        <div class="bg-white border border-gray-200 rounded-lg">
          <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3">
            <h3 class="text-lg font-semibold text-gray-700">Pengumuman Penting</h3>
            <a href="{{ route('pengumuman.index') }}" class="text-sm px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
              Lihat Semua
            </a>
          </div>
          <div class="divide-y divide-gray-200">
            @forelse($pengumumen as $pengumuman)
            <a href="{{ route('pengumuman.show', $pengumuman) }}" class="flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition">
              <span class="w-1.5 h-8 rounded 
            @if($pengumuman->kategori == 'Penting') bg-red-400 
            @elseif($pengumuman->kategori == 'Akademik') bg-green-400 
            @else bg-blue-400 @endif">
              </span>

              <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center font-semibold text-gray-600">
                {{ strtoupper(Str::limit($pengumuman->kategori ?? 'PGM', 3, '')) }}
              </div>

              <div class="flex-1 min-w-0">
                <span class="block font-medium text-gray-700 truncate">{{ $pengumuman->judul }}</span>
                <p class="text-sm text-gray-500 truncate mt-1">{{ Str::limit(strip_tags($pengumuman->isi), 60) }}</p>
              </div>
            </a>
            @empty
            <div class="px-4 py-3 text-gray-500 text-sm">Belum ada pengumuman.</div>
            @endforelse
          </div>
        </div>
      </div>


      <!-- Kalender Akademik -->
      <div class="lg:col-span-4">
        <div class="bg-white border border-gray-200 rounded-lg">
          <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3">
            <h3 class="text-lg font-semibold text-gray-700">Kalender Akademik</h3>
            <a href="/kalender-akademikbaru" class="text-sm px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
              Lihat Semua
            </a>
          </div>
          <div class="divide-y divide-gray-200">
            <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition">
              <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-semibold">
                REG
              </div>
              <div class="flex-1 min-w-0">
                <p class="font-medium text-gray-700 truncate">Registrasi Semester Baru</p>
                <p class="text-sm text-gray-500 truncate">Proses registrasi dimulai online</p>
              </div>
              <span class="px-2 py-0.5 text-sm rounded bg-blue-50 text-blue-600 border border-blue-100">
                10 Okt
              </span>
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition">
              <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-semibold">
                MUL
              </div>
              <div class="flex-1 min-w-0">
                <p class="font-medium text-gray-700 truncate">Mulai Perkuliahan</p>
                <p class="text-sm text-gray-500 truncate">Semester genap resmi dimulai</p>
              </div>
              <span class="px-2 py-0.5 text-sm rounded bg-blue-50 text-blue-600 border border-blue-100">
                15 Okt
              </span>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@php
// Safely decode keunggulan JSON. If missing or invalid, ensure we have an array.
$keunggalanJson = $hero?->keunggulan ?? '[]';
$keunggulanItems = json_decode($keunggalanJson, true);
if (!is_array($keunggulanItems)) {
  $keunggulanItems = [];
}
@endphp
<!-- Features Section -->
<section class="py-12 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-10">Keunggulan Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($keunggulanItems as $item)
      <div class="bg-white border border-gray-200 rounded-lg p-6 text-center hover:shadow-lg transition duration-300">
        <img src="{{ asset($item['icon']) }}" class="mx-auto mb-4 w-12 h-12" alt="{{ $item['title'] }}">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['title'] }}</h3>
        <p class="text-gray-600">{{ $item['description'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- News -->
<!-- Program Studi -->
<section id="program-studi" class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-left">Program Studi</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @for($i=1;$i<=6;$i++)
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden flex flex-col 
            hover:shadow-xl hover:-translate-y-2 transition duration-300">
        <!-- Gambar -->
        <img src="https://picsum.photos/400/250?random={{ $i+20 }}"
          class="w-full h-48 object-cover hover:scale-105 transition duration-500">
        <!-- Konten -->
        <div class="p-6 flex-1 flex flex-col">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">Program Studi {{ $i }}</h3>
          <p class="text-gray-600 flex-1">
            Deskripsi singkat mengenai Program Studi {{ $i }}. Menyediakan kurikulum modern dengan dukungan dosen berkualitas.
          </p>
        </div>

        <!-- Tombol -->
        <div class="p-6 pt-0">
          <a href="/detailprodi"
            class="block w-full text-center bg-blue-600 text-white py-2 px-4 rounded-lg 
              hover:bg-blue-700 hover:scale-105 transition duration-300">
            Selengkapnya
          </a>
        </div>
    </div>
    @endfor
  </div>
  </div>
</section>

<!-- News Section -->
<section class="py-12 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="flex items-center justify-between mb-8">
      <h2 class="text-2xl md:text-3xl font-bold">Berita & Kegiatan Terbaru</h2>
      <a href="{{ route('berita.index') }}"
        class="inline-flex items-center gap-2 text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke="currentColor" fill="none">
          <path d="M16 6h3v12a2 2 0 0 1-4 0V5H7a1 1 0 0 0-1 1v12a3 3 0 0 0 3 3h11" />
        </svg>
        Lihat Semua Berita
      </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Featured -->
      @if($utama)
      <div class="lg:col-span-7 bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition duration-300">
        <img src="https://picsum.photos/1200/640?random={{ $utama->id }}" class="w-full h-64 object-cover" alt="{{ $utama->judul }}">
        <div class="p-6">
          <div class="flex items-center gap-2 mb-2">
            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">{{ $utama->kategori }}</span>
            <span class="text-gray-500 text-sm">{{ $utama->tanggal->format('d M Y') }}</span>
          </div>
          <h3 class="text-xl font-semibold mb-2">{{ $utama->judul }}</h3>
          <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($utama->isi), 100) }}</p>
          <a href="{{ route('landing.detailberita', $utama) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Baca Selengkapnya</a>
        </div>
      </div>
      @endif

      <!-- List berita -->
      <div class="lg:col-span-5 space-y-4">
        @foreach($lainnya as $berita)
        <div class="flex gap-4 bg-white rounded-xl border border-gray-200 p-4 hover:shadow-lg hover:-translate-y-1 transition duration-300">
          <img src="https://picsum.photos/320/200?random={{ $berita->id }}" class="w-32 h-20 object-cover rounded" alt="{{ $berita->judul }}">
          <div>
            <div class="flex items-center gap-2 text-xs mb-1">
              <span class="bg-gray-200 text-gray-700 px-2 py-0.5 rounded">{{ $berita->kategori }}</span>
              <span class="text-gray-500">{{ $berita->tanggal->format('d M Y') }}</span>
            </div>
            <h4 class="text-sm font-semibold">{{ $berita->judul }}</h4>
            <p class="text-gray-500 text-xs mb-2">{{ Str::limit(strip_tags($berita->isi), 60) }}</p>
            <a href="{{ route('landing.detailberita', $berita) }}" class="text-blue-600 text-sm">Baca →</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


<!-- Gallery Section -->
<section class="py-12">
  <div class="container mx-auto px-4">
    <div class="flex items-center justify-between mb-8">
      <h2 class="text-2xl md:text-3xl font-bold">Galeri Kampus</h2>
      <a href="{{ route('galeri.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Lihat Semua Galeri
      </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($galeris as $galeri)
      @php
      // Ambil gambar pertama dari JSON
      $gambarUtama = is_array($galeri->gambar) && count($galeri->gambar) > 0
      ? asset($galeri->gambar[0])
      : 'https://picsum.photos/600/338?random=' . $galeri->id;
      @endphp
      <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition duration-300">
        <div class="relative">
          <img
            src="{{ $gambarUtama }}"
            class="w-full h-48 object-cover"
            alt="{{ $galeri->judul }}">
        </div>
        <div class="p-4">
          <div class="flex items-center justify-between mb-2">
            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded">
              {{ $galeri->kategori ?? 'Umum' }}
            </span>
            <span class="text-gray-500 text-xs">
              {{ $galeri->created_at->format('d M Y') }}
            </span>
          </div>
          <h3 class="font-semibold mb-2">{{ $galeri->judul }}</h3>
          <p class="text-gray-600 text-sm mb-3">{{ \Illuminate\Support\Str::limit($galeri->deskripsi, 80) }}</p>
          <a href="{{ route('detailgaleri.index', ['id' => $galeri->id]) }}" class="inline-flex items-center text-blue-600 text-sm">
            Lihat Galeri →
          </a>
        </div>
      </div>
      @empty
      <p class="col-span-3 text-center text-gray-500">Belum ada galeri.</p>
      @endforelse
    </div>
  </div>
</section>


<!-- FAQ Section -->
<section class="py-16 bg-gray-50" x-data>
  <div class="container mx-auto px-4">
    <h2 class="text-center text-2xl md:text-3xl font-bold mb-10 text-gray-800">
      Pertanyaan Umum
    </h2>

    <div class="space-y-4 max-w-2xl mx-auto">
      @forelse($faqs as $faq)
      <div
        x-data="{ open: false }"
        class="bg-white border border-gray-200 rounded-xl shadow-sm transition hover:shadow-md overflow-hidden">

        <!-- Header -->
        <button
          @click="open = !open"
          class="w-full flex justify-between items-center p-5 text-left font-medium text-gray-800 cursor-pointer">
          <span>{{ $faq->pertanyaan }}</span>
          <svg :class="open ? 'rotate-180' : ''"
            class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <!-- Jawaban -->
        <div
          x-show="open"
          x-transition:enter="transition-all ease-out duration-300"
          x-transition:enter-start="max-h-0 opacity-0"
          x-transition:enter-end="max-h-40 opacity-100"
          x-transition:leave="transition-all ease-in duration-200"
          x-transition:leave-start="max-h-40 opacity-100"
          x-transition:leave-end="max-h-0 opacity-0"
          class="px-5 pb-5 text-gray-600 leading-relaxed overflow-hidden">
          {!! $faq->jawaban !!}
        </div>
      </div>
      @empty
      <p class="text-center text-gray-500">Belum ada data FAQ yang tersedia.</p>
      @endforelse
    </div>
  </div>
</section>



<section class="py-12 bg-blue-600 text-white">
  <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">
    <div class="mb-6 lg:mb-0">
      <h2 class="text-2xl md:text-3xl font-bold mb-2">Siap Bergabung dengan Kami?</h2>
      <p>Daftar sekarang dan mulai perjalanan akademik Anda bersama kami.</p>
    </div>
    <a href="https://pmb.alvion.id" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">
      Daftar Sekarang
    </a>
  </div>
</section>

@endsection