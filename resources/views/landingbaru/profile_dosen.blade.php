@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Organisasi -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1480&auto=format&fit=crop');">
    <div class="absolute inset-0 bg-blue-900/70"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Profile Dosen</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Wadah pengembangan diri, kreativitas, dan kepemimpinan mahasiswa
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profile Dosen</span>
        </nav>
    </div>
</section>

<!-- Filter & Search -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col md:flex-row md:items-end md:space-x-4 space-y-4 md:space-y-0">
      <input type="text" placeholder="Cari dosen..." class="border border-gray-200 px-3 py-2 rounded-lg flex-1 text-sm focus:ring-1 focus:ring-blue-400 focus:outline-none" id="searchInput">
    </div>
  </div>
</section>

<!-- Grid Profile Dosen -->
<section class="py-10">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="orgGrid">

    @forelse($profileDosen as $dosenRaw)
      @php
        $dosen = ensure_profile_dosen_object($dosenRaw);
        $foto = $dosen->foto ?? null;
        $nama = $dosen->nama ?? '-';
        $nidn = $dosen->nidn ?? null;
        $status = $dosen->status ?? null;
      @endphp

      <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col group" data-name="{{ $nama }}">
        <div class="p-6 flex flex-col flex-1">
          <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-100 flex-shrink-0">
              @if(!empty($foto))
                <img src="{{ config('app.api_storage') . $foto }}" alt="{{ $nama }}" class="w-full h-full object-cover">
              @else
                <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">No Photo</div>
              @endif
            </div>

            <div class="min-w-0">
              <h3 class="text-lg font-semibold text-gray-800 truncate group-hover:text-blue-700 transition">{{ $nama }}</h3>
              @if(!empty($nidn))
                <p class="text-sm text-gray-500">NIDN: {{ $nidn }}</p>
              @endif
              @if(!empty($status))
                <p class="text-sm text-blue-700">{{ $status }}</p>
              @endif
            </div>
          </div>

          @if(!empty($dosen->id))
            <div class="mt-4">
              <a href="{{ route('landing.profiledosen.detail', $dosen->id) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">Lihat Detail →</a>
            </div>
          @endif
        </div>
      </div>
    @empty
      <div class="md:col-span-2 lg:col-span-3">
        <p class="text-center text-gray-500">Belum ada data dosen.</p>
      </div>
    @endforelse

  </div>

  @if(method_exists($profileDosen, 'links'))
    <div class="mt-10">
        {{ $profileDosen->links() }}
    </div>
  @endif
</section>

<!-- Filter Functionality -->
<script>
  const searchInput = document.getElementById('searchInput');
  const orgGrid = document.getElementById('orgGrid');

  function filterOrg() {
    const searchValue = searchInput.value.toLowerCase();

    [...orgGrid.children].forEach(card => {
      const name = card.getAttribute('data-name').toLowerCase();
      const matchesSearch = name.includes(searchValue);
      card.style.display = matchesSearch ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', filterOrg);
</script>

@endsection
