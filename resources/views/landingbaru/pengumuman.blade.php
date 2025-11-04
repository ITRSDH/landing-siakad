@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Section Pengumuman -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://plus.unsplash.com/premium_photo-1713296255442-e9338f42aad8?q=80&w=422&auto=format&fit=crop&ixlib=rb-4.1.0');">
    <div class="absolute inset-0 bg-blue-900/70"></div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Pengumuman Resmi</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Informasi terkini & penting dari Universitas Masa Depan
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Pengumuman</span>
        </nav>
    </div>
</section>

<!-- Search & Filter -->
<section class="py-10">
  <form method="GET" class="container mx-auto px-4 grid md:grid-cols-3 gap-4">
    <div class="md:col-span-3 flex gap-2">
      <input type="text" name="q" placeholder="Cari pengumuman..." value="{{ request('q') }}"
             class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-blue-400 focus:outline-none">
      <button class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600">🔍</button>
    </div>
   
  
  </form>
</section>

<!-- Pengumuman List -->
<section class="pb-16">
  <div class="container mx-auto px-4 grid lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-6">
      @forelse($pengumuman as $item)
      <article class="bg-white border border-gray-200 rounded-xl p-6">
        <div class="flex flex-wrap items-center gap-2 text-xs mb-3">
          <span class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded">{{ $item->kategori ?? $item->category ?? 'Umum' }}</span>
          <span class="text-gray-500">
            @if(isset($item->tanggal))
              {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
            @elseif(isset($item->date))
              {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}
            @elseif(isset($item->created_at))
              {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
            @else
              {{ date('d F Y') }}
            @endif
          </span>
          <span class="bg-green-100 text-green-600 px-2 py-0.5 rounded">Aktif</span>
        </div>
        <h3 class="text-lg font-medium mb-2">
          <a href="{{ route('detailpengumuman.index', $item->id) }}" class="hover:text-blue-600">
            {{ $item->judul ?? $item->title ?? 'Judul tidak tersedia' }}
          </a>
        </h3>
        <p class="text-gray-600 text-sm mb-4">
          {{ \Illuminate\Support\Str::limit(strip_tags($item->isi ?? $item->content ?? 'Konten tidak tersedia'), 150) }}
        </p>
        <div class="flex justify-between items-center text-xs">
          <a href="{{ route('detailpengumuman.index', $item->id) }}" class="text-blue-600 hover:underline">Baca Selengkapnya →</a>
          <span class="text-gray-400">
            @if(isset($item->created_at))
              {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
            @else
              Baru saja
            @endif
          </span>
        </div>
      </article>
      @empty
      <p class="text-gray-500 text-center py-6">Belum ada pengumuman.</p>
      @endforelse

      @if(method_exists($pengumuman, 'links'))
        <div class="pt-4">
          {{ $pengumuman->withQueryString()->links() }}
        </div>
      @endif
    </div>

    <!-- Sidebar -->
    <aside class="space-y-6">
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <h5 class="font-medium mb-4">Kategori Pengumuman</h5>
        <ul class="space-y-2 text-sm">
          <li class="flex justify-between items-center">
            <a href="{{ route('pengumuman.index') }}" class="hover:text-blue-600">Semua</a>
            <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs">
              @if(method_exists($pengumuman, 'total'))
                {{ $pengumuman->total() }}
              @else
                {{ $pengumuman->count() }}
              @endif
            </span>
          </li>
          @foreach($kategoriList as $kategori)
          <li class="flex justify-between items-center">
            <a href="{{ route('pengumuman.index', ['kategori' => $kategori]) }}" class="hover:text-blue-600">{{ $kategori }}</a>
            <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs">
              @php
                // Hitung jumlah per kategori dari data yang ada
                $count = 0;
                if(method_exists($pengumuman, 'getCollection')) {
                  // Dari paginator
                  $count = $pengumuman->getCollection()->where(function($item) use ($kategori) {
                    return ($item->kategori ?? $item->category ?? '') == $kategori;
                  })->count();
                } else {
                  // Dari collection biasa
                  $count = $pengumuman->where(function($item) use ($kategori) {
                    return ($item->kategori ?? $item->category ?? '') == $kategori;
                  })->count();
                }
              @endphp
              {{ $count }}
            </span>
          </li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</section>

@endsection
