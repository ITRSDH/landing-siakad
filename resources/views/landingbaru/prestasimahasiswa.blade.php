@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Prestasi -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.1.0');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Prestasi Mahasiswa</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Pencapaian mahasiswa dalam bidang akademik maupun non-akademik
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Prestasi</span>
        </nav>
    </div>
</section>

<!-- Grid Prestasi -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="prestasiGrid">
    
    @foreach($prestasis as $item)
    <article class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition"
             data-category="{{ strtolower($item->tingkat ?? $item->level ?? 'kampus') }}"
             data-name="{{ strtolower($item->nama_mahasiswa ?? $item->student_name ?? 'mahasiswa') }}">
      {{-- <img src="{{ asset($item->gambar ?? $item->image ?? 'images/default-achievement.jpg') }}" 
           alt="{{ $item->judul_prestasi ?? $item->title ?? 'Prestasi' }}" 
           class="w-full h-40 object-cover"> --}}
      <img src="https://picsum.photos/320/200?random={{ $item->id }}" 
           alt="{{ $item->judul_prestasi ?? $item->title ?? 'Prestasi' }}" 
           class="w-full h-40 object-cover">
      <div class="p-6">
        <div class="flex items-center justify-between mb-3">
          <span class="text-xs px-2 py-0.5 rounded 
              @if(($item->tingkat ?? $item->level ?? '') == 'Kampus') bg-blue-100 text-blue-700 
              @elseif(($item->tingkat ?? $item->level ?? '') == 'Nasional') bg-yellow-100 text-yellow-700 
              @elseif(($item->tingkat ?? $item->level ?? '') == 'Internasional') bg-green-100 text-green-700 
              @else bg-gray-100 text-gray-700 @endif">
              {{ $item->tingkat ?? $item->level ?? 'Kampus' }}
          </span>
          <span class="text-xs text-gray-400">{{ $item->tahun ?? $item->year ?? date('Y') }}</span>
        </div>
        <h3 class="text-lg font-medium text-gray-800 mb-1">{{ $item->judul_prestasi ?? $item->title ?? 'Judul tidak tersedia' }}</h3>
        <p class="text-sm text-gray-600 mb-3">Diraih oleh <span class="font-medium">{{ $item->nama_mahasiswa ?? $item->student_name ?? 'Nama tidak tersedia' }}</span> ({{ $item->program_studi ?? $item->study_program ?? 'Program Studi tidak tersedia' }})</p>
        <a href="{{ route('landing.detailprestasi', $item->id) }}" class="text-blue-600 text-sm hover:underline">Detail →</a>
      </div>
    </article>
    @endforeach

  </div>

  @if(method_exists($prestasis, 'links'))
    <div class="mt-10">
        {{ $prestasis->links() }}
    </div>
  @endif
</section>

@endsection
