@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Section -->
<div class="bg-gradient-to-br from-[#003366] to-[#001f4d] text-white text-center py-20 md:py-28 px-4 rounded-b-3xl shadow-lg">
    <h1 class="text-4xl md:text-5xl font-bold my-3 tracking-wide">Pintasan Akademik</h1>
    <p class="text-lg opacity-90 max-w-2xl mx-auto">Solusi Elektrikal Modern</p>
</div>

<!-- Program Studi -->
<div class="max-w-6xl mx-auto py-20 px-6">
    <h2 class="text-3xl font-bold text-center text-[#003366] mb-14 relative">
        Program Studi
        <span class="block w-20 h-1 bg-yellow-400 mx-auto mt-3 rounded-full"></span>
    </h2>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @if($prodis && count($prodis) > 0)
            @foreach ($prodis as $prodi)
              <a href="{{ route('detailprodi.index', ['id' => $prodi['id'] ?? $prodi->id]) }}" class="bg-white rounded-2xl shadow-md border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
                  <h3 class="bg-gradient-to-r from-[#003366] to-[#00509d] text-white text-lg font-semibold px-6 py-4 rounded-t-2xl">
                     {{ $prodi['nama_prodi'] ?? $prodi->nama_prodi }} ({{ $prodi['kode_prodi'] ?? $prodi->kode_prodi }})
                  </h3>
                  <p class="p-6 text-gray-600">
                      Deskripsi singkat mengenai Program Studi. Menyediakan kurikulum modern dengan dukungan dosen berkualitas.
                  </p>
              </a>
            @endforeach
        @else
            <div class="col-span-full bg-yellow-50 border border-yellow-200 rounded-lg p-8 text-center">
                <p class="text-gray-600 text-lg">Data Program Studi tidak tersedia.</p>
            </div>
        @endif
    </div>
</div>

<section class="py-12 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-10">Keunggulan Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <div class="bg-white border border-gray-200 rounded-lg p-6 text-center hover:bg-gray-50 transition">
        <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-blue-50 text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 19h18M5 6a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6z" />
          </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-700 mb-2">Pembelajaran Digital</h3>
        <p class="text-gray-500 text-sm">Akses 24/7 ke materi perkuliahan dengan platform online terintegrasi.</p>
      </div>

      <div class="bg-white border border-gray-200 rounded-lg p-6 text-center hover:bg-gray-50 transition">
        <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-green-50 text-green-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 15a3 3 0 1 0-6 0 3 3 0 0 0 6 0z" />
            <path d="M13 17.5v4.5l2-1.5 2 1.5v-4.5" />
            <path d="M10 19H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-1 1.73" />
          </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-700 mb-2">Sertifikasi Industri</h3>
        <p class="text-gray-500 text-sm">Program sertifikasi profesional dari mitra industri.</p>
      </div>

      <div class="bg-white border border-gray-200 rounded-lg p-6 text-center hover:bg-gray-50 transition">
        <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center rounded-full bg-purple-50 text-purple-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="9" />
            <path d="M3.6 9h16.8M3.6 15h16.8M11.5 3a17 17 0 0 0 0 18M12.5 3a17 17 0 0 1 0 18" />
          </svg>
        </div>
        <h3 class="text-lg font-medium text-gray-700 mb-2">Jaringan Global</h3>
        <p class="text-gray-500 text-sm">Kesempatan pertukaran pelajar dan kolaborasi internasional.</p>
      </div>

    </div>
  </div>
</section>
<!-- CTA -->
<section
    class="relative bg-gradient-to-r from-[#003366] to-[#00509d] text-white py-24 px-6 rounded-3xl max-w-6xl mx-auto mb-20 text-center flex flex-col items-center justify-center shadow-xl">
    <h2 class="text-4xl font-bold mb-6">Siap Bergabung dengan Kami?</h2>
    <p class="text-lg max-w-2xl mx-auto opacity-90">Daftar sekarang dan mulai perjalanan akademik Anda bersama kami.</p>
    <a href="#"
       class="inline-block bg-yellow-400 text-[#003366] font-semibold px-10 py-4 rounded-full mt-8 shadow-md hover:bg-yellow-500 hover:scale-105 transform transition">
        Daftar Sekarang
    </a>
</section>

@endsection
