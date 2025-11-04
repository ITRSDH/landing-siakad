@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Jadwal Kuliah -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.1.0');">
    
    <div class="absolute inset-0 bg-blue-900/70"></div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Jadwal Kuliah</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Lihat jadwal perkuliahan berdasarkan hari, mata kuliah, dan semester
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Jadwal Kuliah</span>
        </nav>
    </div>
</section>

<!-- Filter & Search -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="bg-white border border-gray-200 rounded-xl p-6 flex flex-col md:flex-row md:items-end md:space-x-4 space-y-4 md:space-y-0">
      <input type="text" placeholder="Cari mata kuliah..." class="border border-gray-200 p-2 rounded-lg flex-1 focus:ring-1 focus:ring-blue-500" id="searchInput">
      <select class="border border-gray-200 p-2 rounded-lg focus:ring-1 focus:ring-blue-500" id="dayFilter">
        <option value="">Semua Hari</option>
        <option value="senin">Senin</option>
        <option value="selasa">Selasa</option>
        <option value="rabu">Rabu</option>
        <option value="kamis">Kamis</option>
        <option value="jumat">Jumat</option>
      </select>
      <select class="border border-gray-200 p-2 rounded-lg focus:ring-1 focus:ring-blue-500" id="semesterFilter">
        <option value="">Semua Semester</option>
        <option value="1">Semester 1</option>
        <option value="3">Semester 3</option>
        <option value="5">Semester 5</option>
        <option value="7">Semester 7</option>
      </select>
    </div>
  </div>
</section>

<!-- Jadwal Table -->
<section class="py-10">
  <div class="container mx-auto px-4">
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-gray-100 text-gray-600">
            <tr>
              <th class="px-4 py-3 text-left">Hari</th>
              <th class="px-4 py-3 text-left">Jam</th>
              <th class="px-4 py-3 text-left">Mata Kuliah</th>
              <th class="px-4 py-3 text-left">Dosen</th>
              <th class="px-4 py-3 text-left">Ruang</th>
              <th class="px-4 py-3 text-left">Semester</th>
            </tr>
          </thead>
          <tbody id="scheduleTable" class="divide-y divide-gray-100">
            <tr data-day="senin" data-semester="1" data-name="Matematika Dasar">
              <td class="px-4 py-3">Senin</td>
              <td class="px-4 py-3">08:00 - 10:00</td>
              <td class="px-4 py-3 font-medium">Matematika Dasar</td>
              <td class="px-4 py-3">Dr. Ahmad</td>
              <td class="px-4 py-3">Ruang A1</td>
              <td class="px-4 py-3">1</td>
            </tr>
            <tr data-day="selasa" data-semester="3" data-name="Algoritma Pemrograman">
              <td class="px-4 py-3">Selasa</td>
              <td class="px-4 py-3">10:00 - 12:00</td>
              <td class="px-4 py-3 font-medium">Algoritma Pemrograman</td>
              <td class="px-4 py-3">Bu Siti</td>
              <td class="px-4 py-3">Lab Komputer</td>
              <td class="px-4 py-3">3</td>
            </tr>
            <tr data-day="rabu" data-semester="5" data-name="Basis Data">
              <td class="px-4 py-3">Rabu</td>
              <td class="px-4 py-3">13:00 - 15:00</td>
              <td class="px-4 py-3 font-medium">Basis Data</td>
              <td class="px-4 py-3">Pak Budi</td>
              <td class="px-4 py-3">Ruang B2</td>
              <td class="px-4 py-3">5</td>
            </tr>
            <tr data-day="kamis" data-semester="7" data-name="Kecerdasan Buatan">
              <td class="px-4 py-3">Kamis</td>
              <td class="px-4 py-3">09:00 - 11:00</td>
              <td class="px-4 py-3 font-medium">Kecerdasan Buatan</td>
              <td class="px-4 py-3">Dr. Rina</td>
              <td class="px-4 py-3">Ruang C1</td>
              <td class="px-4 py-3">7</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination Dummy -->
    <div class="flex justify-center gap-1 pt-6 text-sm">
      <button class="px-3 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-100">‹</button>
      <button class="px-3 py-1 rounded bg-blue-500 text-white">1</button>
      <button class="px-3 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-100">2</button>
      <button class="px-3 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-100">3</button>
      <button class="px-3 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-100">›</button>
    </div>
  </div>
</section>

<!-- Filter Functionality -->
<script>
  const searchInput = document.getElementById('searchInput');
  const dayFilter = document.getElementById('dayFilter');
  const semesterFilter = document.getElementById('semesterFilter');
  const scheduleTable = document.getElementById('scheduleTable');

  function filterSchedule() {
    const searchValue = searchInput.value.toLowerCase();
    const dayValue = dayFilter.value;
    const semesterValue = semesterFilter.value;

    [...scheduleTable.children].forEach(row => {
      const name = row.getAttribute('data-name').toLowerCase();
      const day = row.getAttribute('data-day');
      const semester = row.getAttribute('data-semester');

      const matchesSearch = name.includes(searchValue);
      const matchesDay = !dayValue || day === dayValue;
      const matchesSemester = !semesterValue || semester === semesterValue;

      row.style.display = matchesSearch && matchesDay && matchesSemester ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', filterSchedule);
  dayFilter.addEventListener('change', filterSchedule);
  semesterFilter.addEventListener('change', filterSchedule);
</script>

@endsection
