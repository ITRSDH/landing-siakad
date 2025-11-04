<nav id="navbar" class="fixed w-full z-50 transition-colors duration-300 bg-transparent">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center h-16">

      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8">
        <span id="navbar-logo" class="font-bold text-lg text-white transition-colors duration-300">Stikes Dian Husada</span>
      </div>

      <!-- Menu -->
      <ul id="navbar-menu" class="hidden md:flex items-center space-x-6 transition-colors duration-300">

        <!-- Beranda -->
        <li>
          <a href="/" class="desktop-link nav-link text-white hover:text-blue-500 font-medium">Beranda</a>
        </li>

        <!-- Akademik -->
        <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
          <button class="desktop-button flex items-center space-x-1 text-white hover:text-blue-500 font-medium">
            <span>Akademik</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="absolute left-0 mt-1 w-56 bg-white shadow-lg rounded-lg border border-gray-200">
            <a href="/programstudibaru" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Program Studi</a>
            <a href="/kalender-akademikbaru" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Kalender Akademik</a>
          </div>
        </li>

        <!-- Kemahasiswaan -->
        <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
          <button class="desktop-button flex items-center space-x-1 text-white hover:text-blue-500 font-medium">
            <span>Kemahasiswaan</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="absolute left-0 mt-1 w-56 bg-white shadow-lg rounded-lg border border-gray-200">
            <a href="/ormawa" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Organisasi Mahasiswa</a>
            <a href="{{ Route('landing.beasiswa') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Beasiswa</a>
            <a href="/prestasibaru" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Prestasi Mahasiswa</a>
          </div>
        </li>

        <!-- Publikasi -->
        <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
          <button class="desktop-button flex items-center space-x-1 text-white hover:text-blue-500 font-medium">
            <span>Publikasi</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="absolute left-0 mt-1 w-56 bg-white shadow-lg rounded-lg border border-gray-200">
            <a href="/pengumumanbaru" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Pengumuman</a>
            <a href="/beritabaru" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Berita Kampus</a>
            <a href="/galeribaru" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Galeri</a>
          </div>
        </li>

        <!-- Institusi -->
        <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
          <button class="desktop-button flex items-center space-x-1 text-white hover:text-blue-500 font-medium">
            <span>Institusi</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="absolute left-0 mt-1 w-56 bg-white shadow-lg rounded-lg border border-gray-200">
            <a href="/kampusbaru#profil" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Profil</a>
            <a href="/kampusbaru#visi-misi" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Visi & Misi</a>
            <a href="/kampusbaru#struktur-organisasi" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Struktur Organisasi</a>
            <a href="/kampusbaru#fasilitas" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Fasilitas</a>
            <a href="/kampusbaru#galeri" class="block px-4 py-2 text-gray-600 hover:bg-gray-50">Galeri</a>
          </div>
        </li>

        <!-- Kontak -->
        <li>
          <a href="/kontakbaru" class="desktop-link nav-link text-white hover:text-blue-500 font-medium">Kontak</a>
        </li>

      </ul>

      <!-- Right: Icons -->
      <div class="flex items-center space-x-4">
        <!-- Notifikasi -->
        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
          <button class="desktop-button relative text-white hover:text-blue-500 p-2">
            <!-- Icon Bell -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
              <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
            </svg>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
          </button>
          <div x-show="open" x-transition class="absolute right-0 mt-1 w-80 bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200 z-50">
            <div class="p-4 border-b border-gray-200 font-semibold text-gray-600 flex justify-between items-center">
              <span>Notifikasi</span>
              <button class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <div class="divide-y divide-gray-200">
              <a href="#" class="flex items-start gap-3 p-4 hover:bg-gray-50">
                <span class="w-2 h-2 mt-2 bg-red-500 rounded-full"></span>
                <div>
                  <p class="text-sm font-medium text-gray-600">Pengumuman: Jadwal UTS</p>
                  <p class="text-xs text-gray-400">UTS Semester Ganjil 2023/2024 telah dirilis</p>
                </div>
              </a>
              <a href="#" class="flex items-start gap-3 p-4 hover:bg-gray-50">
                <span class="w-2 h-2 mt-2 bg-yellow-400 rounded-full"></span>
                <div>
                  <p class="text-sm font-medium text-gray-600">Info: Pembayaran UKT</p>
                  <p class="text-xs text-gray-400">Batas akhir pembayaran 30 Sept 2023</p>
                </div>
              </a>
              <a href="#" class="flex items-start gap-3 p-4 hover:bg-gray-50">
                <span class="w-2 h-2 mt-2 bg-green-500 rounded-full"></span>
                <div>
                  <p class="text-sm font-medium text-gray-600">Info: Beasiswa</p>
                  <p class="text-xs text-gray-400">Pendaftaran beasiswa prestasi telah dibuka</p>
                </div>
              </a>
            </div>
            <div class="p-3 flex gap-2">
              <a href="#" class="w-1/2 text-center text-sm py-2 rounded-md bg-gray-50 hover:bg-gray-100 text-gray-600">Archive all</a>
              <a href="#" class="w-1/2 text-center text-sm py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">Mark all as read</a>
            </div>
          </div>

        </div>

        <!-- Portal / Aplikasi Kampus -->
        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
          <button class="desktop-button text-white hover:text-blue-500 p-2">
            <!-- Icon Apps -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z" />
            </svg>
          </button>
          <div x-show="open" x-transition class="absolute right-0 mt-1 w-80 bg-white shadow-lg rounded-xl border border-gray-200 z-50">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
              <span class="font-semibold text-gray-600">Aplikasi Kampus</span>
            </div>
            <div class="grid grid-cols-3 gap-4 p-4">
              <a href="https://siakad.alvion.id" class="flex flex-col items-center p-2 rounded-lg hover:bg-gray-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M22 9l-10-4-10 4 10 4 10-4v6" />
                  <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                </svg>
                <span class="text-xs font-medium text-gray-600">SIAKAD</span>
              </a>
              <a href="https://pmb.alvion.id" class="flex flex-col items-center p-2 rounded-lg hover:bg-gray-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M3 19h18M5 6h14v8H5z" />
                </svg>
                <span class="text-xs font-medium text-gray-600">PMB</span>
              </a>
              <a href="#" class="flex flex-col items-center p-2 rounded-lg hover:bg-gray-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M5 4h2v16H5zM9 4h2v16H9zM5 8h4M9 16h4M15 4h2v16h-2z" />
                </svg>
                <span class="text-xs font-medium text-gray-600">Perpustakaan</span>
              </a>
            </div>
          </div>
        </div>
        <div class="md:hidden flex items-center">
          <button id="mobile-menu-btn" class="desktop-button text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

    </div>
    <div id="mobile-menu" class="hidden md:hidden bg-white text-gray-700 border-t border-gray-200">
      <ul class="flex flex-col p-4 space-y-2">
        <!-- Beranda -->
        <li><a href="/" class="block py-2 px-4 hover:bg-gray-100 rounded">Beranda</a></li>

        <!-- Akademik -->
        <li x-data="{ open: false }">
          <button @click="open = !open" class="w-full flex justify-between items-center py-2 px-4 hover:bg-gray-100 rounded">
            Akademik
            <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="pl-4 mt-1 space-y-1">
            <a href="/programstudibaru" class="block py-1 px-2 hover:bg-gray-50 rounded">Program Studi</a>
            <a href="/kalender-akademikbaru" class="block py-1 px-2 hover:bg-gray-50 rounded">Kalender Akademik</a>
          </div>
        </li>

        <!-- Kemahasiswaan -->
        <li x-data="{ open: false }">
          <button @click="open = !open" class="w-full flex justify-between items-center py-2 px-4 hover:bg-gray-100 rounded">
            Kemahasiswaan
            <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="pl-4 mt-1 space-y-1">
            <a href="/ormawa" class="block py-1 px-2 hover:bg-gray-50 rounded">Organisasi Mahasiswa</a>
            <a href="{{ Route('landing.beasiswa') }}" class="block py-1 px-2 hover:bg-gray-50 rounded">Beasiswa</a>
            <a href="/prestasibaru" class="block py-1 px-2 hover:bg-gray-50 rounded">Prestasi Mahasiswa</a>
          </div>
        </li>

        <!-- Publikasi -->
        <li x-data="{ open: false }">
          <button @click="open = !open" class="w-full flex justify-between items-center py-2 px-4 hover:bg-gray-100 rounded">
            Publikasi
            <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="pl-4 mt-1 space-y-1">
            <a href="/pengumumanbaru" class="block py-1 px-2 hover:bg-gray-50 rounded">Pengumuman</a>
            <a href="/beritabaru" class="block py-1 px-2 hover:bg-gray-50 rounded">Berita Kampus</a>
            <a href="/galeribaru" class="block py-1 px-2 hover:bg-gray-50 rounded">Galeri</a>
          </div>
        </li>

        <!-- Institusi -->
        <li x-data="{ open: false }">
          <button @click="open = !open" class="w-full flex justify-between items-center py-2 px-4 hover:bg-gray-100 rounded">
            Institusi
            <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="open" x-transition class="pl-4 mt-1 space-y-1">
            <a href="/kampusbaru#profil" class="block py-1 px-2 hover:bg-gray-50 rounded">Profil</a>
            <a href="/kampusbaru#visi-misi" class="block py-1 px-2 hover:bg-gray-50 rounded">Visi & Misi</a>
            <a href="/kampusbaru#struktur-organisasi" class="block py-1 px-2 hover:bg-gray-50 rounded">Struktur Organisasi</a>
            <a href="/kampusbaru#fasilitas" class="block py-1 px-2 hover:bg-gray-50 rounded">Fasilitas</a>
            <a href="/kampusbaru#galeri" class="block py-1 px-2 hover:bg-gray-50 rounded">Galeri</a>
          </div>
        </li>

        <!-- Kontak -->
        <li><a href="/kontakbaru" class="block py-2 px-4 hover:bg-gray-100 rounded">Kontak</a></li>
      </ul>
    </div>

  </div>
</nav>
@push('scripts')
<script>
  const navbar = document.getElementById('navbar');
  const navbarLogo = document.getElementById('navbar-logo');
  const navbarButtons = navbar.querySelectorAll('.desktop-button'); // HANYA tombol desktop
  const navbarLinks = navbar.querySelectorAll('.desktop-link'); // HANYA link desktop
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  window.addEventListener('scroll', () => {
    const isScrolled = window.scrollY > 10;

    if (isScrolled) {
      navbar.classList.add('bg-white', 'shadow-md');
      navbar.classList.remove('bg-transparent');

      navbarLogo.classList.add('text-gray-700');
      navbarLogo.classList.remove('text-white');

      navbarButtons.forEach(btn => {
        btn.classList.add('text-gray-700');
        btn.classList.remove('text-white');
      });

      navbarLinks.forEach(link => {
        link.classList.add('text-gray-700');
        link.classList.remove('text-white');
      });
    } else {
      navbar.classList.remove('bg-white', 'shadow-md');
      navbar.classList.add('bg-transparent');

      navbarLogo.classList.remove('text-gray-700');
      navbarLogo.classList.add('text-white');

      navbarButtons.forEach(btn => {
        btn.classList.remove('text-gray-700');
        btn.classList.add('text-white');
      });

      navbarLinks.forEach(link => {
        link.classList.remove('text-gray-700');
        link.classList.add('text-white');
      });
    }
  });

  // Toggle mobile menu
  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
@endpush