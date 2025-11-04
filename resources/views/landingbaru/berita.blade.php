@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Berita -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://plus.unsplash.com/premium_photo-1691223714882-57a432c4edaf?q=80&w=1481&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Berita & Artikel</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Informasi terkini dan artikel menarik seputar dunia pendidikan
        </p>
    </div>
</section>

<!-- Content -->
<section class="py-10">
  <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Main News -->
    <div class="lg:col-span-2 space-y-6">

      @foreach($beritas as $berita)
      <article class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition">
        {{-- <img src="{{ asset($berita->gambar ?? $berita->image ?? 'https://picsum.photos/960/540') }}" 
             alt="{{ $berita->judul ?? $berita->title ?? 'Berita' }}" 
             class="w-full h-56 object-cover"> --}}

        <img src="https://picsum.photos/960/540?random={{ $berita->id }}" 
             alt="{{ $berita->judul ?? $berita->title ?? 'Berita' }}" 
             class="w-full h-56 object-cover">

        <div class="p-6">
          <span class="inline-block bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded mb-3">
            {{ $berita->kategori ?? $berita->category ?? 'Umum' }}
          </span>

          <div class="text-xs text-gray-500 flex items-center gap-4 mb-2">
            <span>📅 
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
            <span>👤 {{ $berita->author ?? 'Admin' }}</span>
          </div>

          <h3 class="text-lg font-medium mb-2">
            <a href="{{ route('landing.detailberita', $berita->id) }}" class="hover:text-blue-600">
              {{ $berita->judul ?? $berita->title ?? 'Judul tidak tersedia' }}
            </a>
          </h3>

          <p class="text-gray-600 text-sm mb-4">
            {{ Str::limit(strip_tags($berita->isi ?? $berita->content ?? 'Konten tidak tersedia'), 120) }}
          </p>

          <a href="{{ route('landing.detailberita', $berita->id) }}" class="text-sm text-blue-600 hover:underline">
            Baca Selengkapnya →
          </a>
        </div>
      </article>
      @endforeach

      <div class="pt-6">
        @if(isset($beritas) && method_exists($beritas, 'hasPages') && $beritas->hasPages())
          {{ $beritas->links() }}
        @endif
      </div>
    </div>

    <!-- Sidebar -->
    <aside class="space-y-6">
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <h5 class="font-medium mb-4">📰 Berita Terbaru</h5>
        <div class="space-y-4 text-sm">
          @foreach($beritas->take(3) as $recent)
          <div class="flex gap-3">
            {{-- <img src="{{ asset($recent->gambar ?? $recent->image ?? 'https://picsum.photos/100/100') }}" class="w-16 h-16 object-cover rounded-lg"> --}}
            <img src="https://picsum.photos/100/100?random={{ $recent->id }}" class="w-16 h-16 object-cover rounded-lg">
            <div>
              <a href="{{ route('landing.detailberita', $recent->id) }}" class="font-medium hover:text-blue-600">
                {{ Str::limit($recent->judul ?? $recent->title ?? 'Judul tidak tersedia', 50) }}
              </a>
              <p class="text-xs text-gray-500">
                @if(isset($recent->tanggal))
                  {{ \Carbon\Carbon::parse($recent->tanggal)->diffForHumans() }}
                @elseif(isset($recent->date))
                  {{ \Carbon\Carbon::parse($recent->date)->diffForHumans() }}
                @elseif(isset($recent->created_at))
                  {{ \Carbon\Carbon::parse($recent->created_at)->diffForHumans() }}
                @else
                  {{ 'Baru saja' }}
                @endif
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </aside>
  </div>
</section>

@endsection
