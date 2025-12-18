@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Organisasi -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1480&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Organisasi Mahasiswa</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Wadah pengembangan diri, kreativitas, dan kepemimpinan mahasiswa
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Organisasi</span>
        </nav>
    </div>
</section>

<!-- Filter & Search -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col md:flex-row md:items-end md:space-x-4 space-y-4 md:space-y-0">
      <input type="text" placeholder="Cari organisasi..." class="border border-gray-200 px-3 py-2 rounded-lg flex-1 text-sm focus:ring-1 focus:ring-blue-400 focus:outline-none" id="searchInput">
      <select class="border border-gray-200 p-2 rounded-lg" id="categoryFilter">
        <option value="">Semua Kategori</option>
        <option value="akademik">Akademik</option>
        <option value="seni">Seni</option>
        <option value="olahraga">Olahraga</option>
        <option value="sosial">Sosial</option>
      </select>
    </div>
  </div>
</section>

<!-- Grid Organisasi -->
<section class="py-10">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="orgGrid">

    @foreach($ormawas as $item)
      <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col group"
          data-category="{{ strtolower($item->kategori ?? 'umum') }}" data-name="{{ $item->nama ?? $item->name ?? 'Tidak ada nama' }}">

        <div class="relative">
          <img src="{{ $item->gambar ? config('app.api_storage') . $item->gambar : 'https://picsum.photos/600/338?random=' . $item->id }}" alt="{{ $item->nama ?? $item->name ?? 'Organisasi' }}" class="w-full h-40 object-cover">
          <span class="absolute top-3 left-3 bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded-lg shadow-sm">
            {{ ucfirst(str_replace('_', ' ', $item->kategori ?? 'Umum')) }}
          </span>
        </div>

        <div class="p-6 flex flex-col flex-1">
          <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700 transition">
            {{ $item->nama ?? $item->name ?? 'Nama tidak tersedia' }}
          </h3>
          <p class="text-sm text-gray-600 mt-2 flex-1">{{ Str::limit($item->deskripsi ?? $item->description ?? 'Deskripsi tidak tersedia', 100) }}</p>

          <div class="mt-4 border-t pt-3 text-sm text-gray-500">
            Jumlah Anggota: <span class="font-medium text-gray-700">{{ $item->jumlah_anggota ?? $item->member_count ?? 'Tidak diketahui' }}</span>
          </div>

          <div class="mt-4">
            <a href="{{ route('landing.detailormawa', $item->id) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">Lihat Detail →</a>
          </div>
        </div>
      </div>
    @endforeach

  </div>

  @if(method_exists($ormawas, 'links'))
    <div class="mt-10">
        {{ $ormawas->links() }}
    </div>
  @endif
</section>

<!-- Filter Functionality -->
<script>
  const searchInput = document.getElementById('searchInput');
  const categoryFilter = document.getElementById('categoryFilter');
  const orgGrid = document.getElementById('orgGrid');

  function filterOrg() {
    const searchValue = searchInput.value.toLowerCase();
    const categoryValue = categoryFilter.value;

    [...orgGrid.children].forEach(card => {
      const name = card.getAttribute('data-name').toLowerCase();
      const category = card.getAttribute('data-category');
      const matchesSearch = name.includes(searchValue);
      const matchesCategory = !categoryValue || category === categoryValue;
      card.style.display = matchesSearch && matchesCategory ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', filterOrg);
  categoryFilter.addEventListener('change', filterOrg);
</script>

@endsection
