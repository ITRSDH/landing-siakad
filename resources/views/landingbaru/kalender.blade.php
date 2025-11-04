@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Kalender Akademik -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
  style="background-image: url('https://images.unsplash.com/photo-1641386337567-c824f91bea87?q=80&w=431&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

  <div class="absolute inset-0 bg-blue-900/70"></div>

  <div class="relative container mx-auto px-4 text-center">
    <h1 class="text-3xl md:text-5xl font-bold mb-4">Kalender Akademik</h1>
    <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
      Jadwal kegiatan akademik dan penting sepanjang tahun
    </p>
    <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
      <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
      <span>/</span>
      <span>Kalender Akademik</span>
    </nav>
  </div>
</section>

<!-- Search & Filter -->
<section class="py-10">
  <div class="container mx-auto px-4 grid md:grid-cols-5 gap-4">
    <div class="md:col-span-2 flex gap-2">
      <input type="text" placeholder="Cari kegiatan..."
        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-blue-400 focus:outline-none">
      <button class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600">🔍</button>
    </div>
    <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-blue-400">
      <option>Semua Tahun</option>
      <option>2025</option>
      <option>2026</option>
    </select>
    <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-blue-400">
      <option>Semua Bulan</option>
      <option>Januari</option>
      <option>Februari</option>
    </select>
    <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-blue-400">
      <option>Semua Jenis</option>
      <option>Ujian</option>
      <option>Libur</option>
      <option>Pendaftaran</option>
    </select>
  </div>
</section>

<!-- Kalender List -->
<section class="pb-16">
  <div class="container mx-auto px-4 grid lg:grid-cols-3 gap-8">

    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
      <!-- Event -->
      <article class="bg-white border border-gray-200 rounded-xl p-6">
        <div class="flex flex-wrap justify-between items-center text-xs mb-3">
          <span class="bg-red-100 text-red-600 px-2 py-0.5 rounded">Ujian</span>
          <span class="text-gray-500">10 Maret 2025</span>
        </div>
        <h3 class="text-lg font-medium mb-2">Ujian Tengah Semester</h3>
        <p class="text-gray-600 text-sm mb-4">
          Ujian untuk semua mahasiswa semester 2
        </p>
        <div class="flex justify-between items-center text-xs">
          <a href="#" class="text-blue-600 hover:underline">Lihat Detail →</a>
          <span class="text-gray-400">Mendatang</span>
        </div>
      </article>

      <article class="bg-white border border-gray-200 rounded-xl p-6">
        <div class="flex flex-wrap justify-between items-center text-xs mb-3">
          <span class="bg-yellow-100 text-yellow-600 px-2 py-0.5 rounded">Libur</span>
          <span class="text-gray-500">17 Maret 2025</span>
        </div>
        <h3 class="text-lg font-medium mb-2">Hari Raya Nyepi</h3>
        <p class="text-gray-600 text-sm mb-4">
          Hari libur nasional untuk seluruh mahasiswa
        </p>
        <div class="flex justify-between items-center text-xs">
          <a href="#" class="text-blue-600 hover:underline">Lihat Detail →</a>
          <span class="text-gray-400">Mendatang</span>
        </div>
      </article>

      <article class="bg-white border border-gray-200 rounded-xl p-6">
        <div class="flex flex-wrap justify-between items-center text-xs mb-3">
          <span class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded">Pendaftaran</span>
          <span class="text-gray-500">1 April 2025</span>
        </div>
        <h3 class="text-lg font-medium mb-2">Pendaftaran Mahasiswa Baru</h3>
        <p class="text-gray-600 text-sm mb-4">
          Pendaftaran untuk calon mahasiswa tahun ajaran 2025/2026
        </p>
        <div class="flex justify-between items-center text-xs">
          <a href="#" class="text-blue-600 hover:underline">Lihat Detail →</a>
          <span class="text-gray-400">Mendatang</span>
        </div>
      </article>
    </div>

    <!-- Sidebar -->
    <aside class="space-y-6">

      <!-- Mini Calendar -->
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <h5 class="font-medium mb-4">Maret 2025</h5>
        <div class="grid grid-cols-7 text-center gap-2 text-xs font-semibold text-gray-500">
          <div>Min</div>
          <div>Sen</div>
          <div>Sel</div>
          <div>Rab</div>
          <div>Kam</div>
          <div>Jum</div>
          <div>Sab</div>
          <div class="text-gray-300">28</div>
          <div class="text-gray-300">29</div>
          <div class="text-gray-300">30</div>
          <div class="text-gray-300">31</div>
          <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-500 text-white font-bold">1</div>
          <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-white text-gray-700">2</div>
          <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-100 text-green-700 font-semibold">3</div>
        </div>
      </div>

      <!-- Statistik -->
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <h5 class="font-medium mb-4">Statistik Kegiatan</h5>
        <div class="grid grid-cols-2 gap-4 text-center">
          <div>
            <div class="text-2xl font-bold text-blue-500">3</div>
            <small class="text-gray-500">Total Kegiatan</small>
          </div>
          <div>
            <div class="text-2xl font-bold text-green-500">1</div>
            <small class="text-gray-500">Bulan Ini</small>
          </div>
          <div>
            <div class="text-2xl font-bold text-yellow-500">2</div>
            <small class="text-gray-500">Mendatang</small>
          </div>
          <div>
            <div class="text-2xl font-bold text-indigo-500">3</div>
            <small class="text-gray-500">Jenis Kegiatan</small>
          </div>
        </div>
      </div>

      <!-- Legend -->
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <h5 class="font-medium mb-4">Jenis Kegiatan</h5>
        <div class="space-y-2 text-sm">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-red-100 text-red-600 text-xs">Ujian</span>
            <span class="text-gray-500">Ujian & evaluasi</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-yellow-100 text-yellow-600 text-xs">Libur</span>
            <span class="text-gray-500">Hari libur & cuti</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-600 text-xs">Pendaftaran</span>
            <span class="text-gray-500">Pendaftaran mahasiswa</span>
          </div>
        </div>
      </div>

    </aside>
  </div>
</section>

@endsection