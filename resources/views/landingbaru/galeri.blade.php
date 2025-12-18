@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1581362072978-14998d01fdaa?q=80&w=1481&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Galeri Kampus</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Koleksi foto dan dokumentasi kegiatan kampus
        </p>
    </div>
</section>

<!-- Filter -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <form method="GET" action="{{ route('galeri.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col md:flex-row md:items-end md:space-x-4 space-y-4 md:space-y-0">
      <input type="text" name="search" placeholder="Cari galeri..." value="{{ request('search') }}" class="border border-gray-200 p-2 rounded-lg flex-1 focus:ring-1 focus:ring-blue-500">
    
      <select name="sort" class="border border-gray-200 p-2 rounded-lg focus:ring-1 focus:ring-blue-500">
        <option value="newest" {{ request('sort')=='newest'?'selected':'' }}>Terbaru</option>
        <option value="oldest" {{ request('sort')=='oldest'?'selected':'' }}>Terlama</option>
        <option value="name_asc" {{ request('sort')=='name_asc'?'selected':'' }}>Nama A-Z</option>
        <option value="name_desc" {{ request('sort')=='name_desc'?'selected':'' }}>Nama Z-A</option>
      </select>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Filter</button>
    </form>
  </div>
</section>

<!-- Gallery Grid -->
<section class="py-10">
  <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($galeris as $galeri)
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden group hover:shadow-md transition">
      <div class="relative">
        <img src="{{ $galeri->gambar ? config('app.api_storage') . $galeri->gambar : 'https://picsum.photos/600/338?random=' . $galeri->id }}" class="w-full h-48 object-cover" alt="{{ $galeri->judul ?? $galeri->title ?? 'Galeri' }}">
      </div>
      <div class="p-4">
        <span class="text-xs font-medium px-2 py-1 bg-blue-100 text-blue-600 rounded">
          {{ ucfirst($galeri->kategori ?? $galeri->category ?? 'Umum') }}
        </span>
        <h3 class="text-lg font-semibold mt-2">{{ $galeri->judul ?? $galeri->title ?? 'Judul tidak tersedia' }}</h3>
        <p class="text-gray-500 text-sm mt-1">
          {{ Str::limit($galeri->deskripsi ?? $galeri->description ?? 'Deskripsi tidak tersedia', 100) }}
        </p>
        <div class="text-xs text-gray-400 mt-2">
          @if(isset($galeri->tanggal))
            {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}
          @elseif(isset($galeri->date))
            {{ \Carbon\Carbon::parse($galeri->date)->format('d M Y') }}
          @elseif(isset($galeri->created_at))
            {{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}
          @else
            {{ date('d M Y') }}
          @endif
        </div>
        <div class="mt-3">
          <a href="{{ route('detailgaleri.index', $galeri->id) }}" 
             class="text-sm text-blue-600 hover:underline">
            Lihat Detail →
          </a>
        </div>
      </div>
    </div>
    @empty
      <p class="col-span-3 text-center text-gray-500">Belum ada galeri yang tersedia.</p>
    @endforelse

  </div>

  @if(method_exists($galeris, 'links'))
    <div class="mt-10 flex justify-center">
      {{ $galeris->withQueryString()->links() }}
    </div>
  @endif
</section>

@endsection
