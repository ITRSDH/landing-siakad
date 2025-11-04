@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Detail -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://plus.unsplash.com/premium_photo-1713296255442-e9338f42aad8?q=80&w=422&auto=format&fit=crop');">
  <div class="absolute inset-0 bg-blue-900/70"></div>
  <div class="relative container mx-auto px-4 text-center">
      <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $pengumuman->judul ?? $pengumuman->title ?? 'Judul tidak tersedia' }}</h1>
      <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">Detail pengumuman resmi</p>
      <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
          <a href="/" class="hover:underline hover:text-white">Beranda</a>
          <span>/</span>
          <a href="{{ route('pengumuman.index') }}" class="hover:underline hover:text-white">Pengumuman</a>
          <span>/</span>
          <span>Detail</span>
      </nav>
  </div>
</section>

<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4 max-w-4xl">
      <div class="bg-white rounded-2xl shadow p-8">
          <div class="flex flex-wrap items-center gap-3 text-sm mb-6">
              <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">{{ $pengumuman->kategori ?? $pengumuman->category ?? 'Umum' }}</span>
              <span class="text-gray-500">
                @if(isset($pengumuman->tanggal))
                  {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F Y') }}
                @elseif(isset($pengumuman->date))
                  {{ \Carbon\Carbon::parse($pengumuman->date)->format('d F Y') }}
                @elseif(isset($pengumuman->created_at))
                  {{ \Carbon\Carbon::parse($pengumuman->created_at)->format('d F Y') }}
                @else
                  {{ date('d F Y') }}
                @endif
              </span>
          </div>

          <div class="prose max-w-full text-gray-700 mb-6">
              {!! $pengumuman->isi ?? $pengumuman->content ?? 'Konten tidak tersedia' !!}
          </div>

          <div class="text-center mt-8">
              <a href="{{ route('pengumuman.index') }}"
                 class="inline-block bg-yellow-400 text-[#003366] font-semibold px-8 py-3 rounded-full shadow hover:bg-yellow-500 hover:scale-105 transform transition">
                  Kembali ke Daftar Pengumuman
              </a>
          </div>
      </div>

      <div class="mt-12">
          <h4 class="font-semibold mb-4">Pengumuman Terbaru</h4>
          <div class="grid md:grid-cols-3 gap-4">
              @foreach($recent as $r)
              <a href="{{ route('detailpengumuman.index', $r->id) }}" class="block bg-white border border-gray-200 p-4 rounded-lg hover:shadow">
                  <h5 class="font-medium">{{ $r->judul ?? $r->title ?? 'Judul tidak tersedia' }}</h5>
                  <p class="text-sm text-gray-500">
                    @if(isset($r->tanggal))
                      {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}
                    @elseif(isset($r->date))
                      {{ \Carbon\Carbon::parse($r->date)->format('d M Y') }}
                    @elseif(isset($r->created_at))
                      {{ \Carbon\Carbon::parse($r->created_at)->format('d M Y') }}
                    @else
                      {{ date('d M Y') }}
                    @endif
                  </p>
              </a>
              @endforeach
          </div>
      </div>
  </div>
</section>

@endsection
