@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Beasiswa -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.1.0');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Informasi Beasiswa</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Temukan berbagai peluang beasiswa untuk mendukung pendidikanmu
        </p>
    </div>
</section>

<!-- Filter -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col md:flex-row md:items-end md:space-x-4 space-y-4 md:space-y-0">
      <input type="text" placeholder="Cari beasiswa..." class="border border-gray-200 px-3 py-2 rounded-lg flex-1 text-sm focus:ring-1 focus:ring-blue-400 focus:outline-none" id="searchInput">
      <select class="border border-gray-200 p-2 rounded-lg" id="categoryFilter">
        <option value="">Semua Kategori</option>
        <option value="prestasi">Prestasi</option>
        <option value="bidikmisi">Bidikmisi / KIP</option>
        <option value="swasta">Beasiswa Swasta</option>
        <option value="internasional">Internasional</option>
      </select>
    </div>
  </div>
</section>

<!-- Daftar Beasiswa -->
<section class="py-10">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="scholarshipGrid">

    @foreach($beasiswas as $item)
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col group"
        data-category="{{ strtolower($item->kategori ?? 'umum') }}" data-name="{{ strtolower($item->nama ?? $item->name ?? 'beasiswa') }}">
      
      <!-- Gambar -->
      <div class="relative">
        {{-- <img src="{{ asset($item->gambar ?? $item->logo ?? 'images/default-scholarship.jpg') }}" alt="{{ $item->nama ?? $item->name ?? 'Beasiswa' }}" class="w-full h-40 object-cover"> --}}
        <img src="https://picsum.photos/320/200?random={{ $item->id }}" alt="{{ $item->nama ?? $item->name ?? 'Beasiswa' }}" class="w-full h-40 object-cover">
        <span class="absolute top-3 left-3 text-xs font-semibold px-2 py-1 rounded-lg shadow-sm 
            @if(($item->kategori ?? '') == 'Prestasi') bg-blue-100 text-blue-700 
            @elseif(($item->kategori ?? '') == 'Bidikmisi' || ($item->kategori ?? '') == 'KIP') bg-green-100 text-green-700 
            @elseif(($item->kategori ?? '') == 'Swasta') bg-purple-100 text-purple-700 
            @elseif(($item->kategori ?? '') == 'Internasional') bg-yellow-100 text-yellow-700 
            @else bg-gray-100 text-gray-700 @endif">
          {{ $item->kategori ?? 'Umum' }}
        </span>
      </div>

      <!-- Konten -->
      <div class="p-5 flex flex-col flex-1">
        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700 transition">
          {{ $item->nama ?? $item->name ?? 'Nama tidak tersedia' }}
        </h3>
        <p class="text-sm text-gray-600 mt-2 flex-1 line-clamp-3">
          {{ Str::limit($item->deskripsi ?? $item->description ?? 'Deskripsi tidak tersedia', 120) }}
        </p>

        <div class="mt-4 border-t pt-3 text-sm text-gray-500 space-y-1">
          <div class="flex justify-between">
            <span>Deadline</span>
            <span class="font-medium text-gray-700">
              @if($item->deadline ?? false)
                {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}
              @else
                -
              @endif
            </span>
          </div>
          <div class="flex justify-between">
            <span>Kuota</span>
            <span class="font-medium text-gray-700">{{ $item->kuota ?? $item->quota ?? 'Tidak disebutkan' }}</span>
          </div>
        </div>

        <div class="mt-4">
          <a href="{{ route('landing.detailbeasiswa', $item->id) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">
            Detail →
          </a>
        </div>
      </div>
    </div>
    @endforeach

  </div>

  @if(method_exists($beasiswas, 'links'))
    <div class="mt-10">
      {{ $beasiswas->links() }}
    </div>
  @endif
</section>

<!-- Filter JS -->
<script>
  const searchInput = document.getElementById('searchInput');
  const categoryFilter = document.getElementById('categoryFilter');
  const scholarshipGrid = document.getElementById('scholarshipGrid');

  function filterScholarship() {
    const searchValue = searchInput.value.toLowerCase();
    const categoryValue = categoryFilter.value;

    [...scholarshipGrid.children].forEach(card => {
      const name = card.getAttribute('data-name');
      const category = card.getAttribute('data-category');

      const matchesSearch = name.includes(searchValue);
      const matchesCategory = !categoryValue || category === categoryValue;

      card.style.display = matchesSearch && matchesCategory ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', filterScholarship);
  categoryFilter.addEventListener('change', filterScholarship);
</script>

@endsection
