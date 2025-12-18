@extends("landingbaru.layout.appbranda")

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $profil->judul ?? $profil->title ?? 'Profil Kampus' }}</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Informasi lengkap mengenai {{ $profil->judul ?? $profil->title ?? 'Universitas Masa Depan' }}
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
        </nav>
    </div>
</section>

<!-- Profil Kampus -->
<section class="py-16 bg-gray-50" id="profil">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Profil</h2>
        <div class="prose max-w-none text-gray-700 mx-auto text-justify leading-relaxed">
            {!! $profil->deskripsi ?? $profil->description ?? '<p>Belum ada deskripsi profil kampus.</p>' !!}
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-16 bg-white" id="visi-misi">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Visi & Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Visi</h3>
                <div class="prose text-gray-700 leading-relaxed">
                    {!! $profil->visi ?? '<p>Belum ada visi.</p>' !!}
                </div>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Misi</h3>
                <div class="prose text-gray-700 leading-relaxed">
                    {!! $profil->misi ?? '<p>Belum ada misi.</p>' !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi -->
<section class="py-16 bg-gray-50" id="struktur-organisasi">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Struktur Organisasi</h2>
        <div class="bg-white p-6 rounded-lg shadow-md inline-block">
            @if(!empty($profil->struktur_image) || !empty($profil->struktur_foto))
                <img src="{{ config('app.api_storage') . ($profil->struktur_image ?? $profil->struktur_foto) }}" 
                     alt="Struktur Organisasi"
                     class="rounded-lg shadow-md mx-auto w-full max-w-4xl object-contain">
            @else
                <img src="https://picsum.photos/800/400?random=10" 
                     alt="Struktur Organisasi"
                     class="rounded-lg shadow-md mx-auto w-full max-w-4xl object-contain">
            @endif
        </div>
    </div>
</section>

<!-- Fasilitas -->
<section class="py-16 bg-white" id="fasilitas">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Fasilitas Kampus</h2>

        @php
            // Handle JSON fasilitas data
            $fasilitasText = $profil->fasilitas ?? $profil->facilities ?? null;
            $fasilitasData = null;
            
            // Try to decode JSON first
            if (!empty($fasilitasText)) {
                $decoded = json_decode($fasilitasText, true);
                if (is_array($decoded)) {
                    $fasilitasData = $decoded;
                }
            }
        @endphp

        @if($fasilitasData)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($fasilitasData as $kategori => $items)
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 text-blue-700 capitalize">
                            {{ str_replace('_', ' ', $kategori) }}
                        </h3>
                        <ul class="space-y-2">
                            @foreach($items as $item)
                                <li class="flex items-start">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                    <span class="text-gray-700">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @elseif(!empty($fasilitasText))
            <!-- Fallback to display as HTML if not JSON -->
            <div class="prose max-w-none text-gray-700 mx-auto leading-relaxed">
                {!! $fasilitasText !!}
            </div>
        @else
            <p class="text-center text-gray-500">Belum ada data fasilitas kampus.</p>
        @endif
    </div>
</section>

<!-- Galeri Kampus -->
<section class="py-12 bg-gray-50" id="galeri">
  <div class="container mx-auto px-4">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Galeri Kampus</h2>
      <a href="{{ route('landing.galeri.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Lihat Semua Galeri
      </a>
    </div>

    <!-- Grid Galeri -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($galeris ?? [] as $galeri)
      <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition duration-300">
        <div class="relative">
          <img 
            src="{{ $galeri->gambar ? config('app.api_storage') . $galeri->gambar : 'https://picsum.photos/600/338?random=' . $galeri->id }}" 
            alt="{{ $galeri->judul ?? $galeri->title ?? 'Galeri' }}" 
            class="w-full h-48 object-cover">
        </div>
        <div class="p-4">
          <div class="flex items-center justify-between mb-2">
            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded">
              {{ $galeri->kategori ?? $galeri->category ?? 'Umum' }}
            </span>
            <span class="text-gray-500 text-xs">
              @if(isset($galeri->tanggal))
                {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}
              @elseif(isset($galeri->date))
                {{ \Carbon\Carbon::parse($galeri->date)->format('d M Y') }}
              @elseif(isset($galeri->created_at))
                {{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}
              @else
                —
              @endif
            </span>
          </div>
          <h3 class="font-semibold mb-2 text-gray-800">{{ $galeri->judul ?? $galeri->title ?? 'Galeri' }}</h3>
          <p class="text-gray-600 text-sm mb-3">
            {!! \Illuminate\Support\Str::limit($galeri->deskripsi ?? $galeri->description ?? 'Tidak ada deskripsi.', 80) !!}
          </p>
          <a href="{{ route('detailgaleri.index', ['id' => $galeri->id]) }}" class="inline-flex items-center text-blue-600 text-sm">
            Lihat Galeri →
          </a>
        </div>
      </div>
      @empty
      @foreach(range(1,6) as $i)
      <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition duration-300">
        <div class="relative">
          <img src="https://picsum.photos/600/338?random={{ $i }}" class="w-full h-48 object-cover" alt="Galeri">
        </div>
        <div class="p-4">
          <div class="flex items-center justify-between mb-2">
            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded">Umum</span>
            <span class="text-gray-500 text-xs">01 Okt 2025</span>
          </div>
          <h3 class="font-semibold mb-2 text-gray-800">Galeri Kampus {{ $i }}</h3>
          <p class="text-gray-600 text-sm mb-3">Deskripsi singkat galeri {{ $i }}.</p>
          <a href="#" class="inline-flex items-center text-blue-600 text-sm">Lihat Galeri →</a>
        </div>
      </div>
      @endforeach
      @endforelse
    </div>
  </div>
</section>

@endsection
