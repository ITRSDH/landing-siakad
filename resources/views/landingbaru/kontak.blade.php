@extends("landingbaru.layout.appbranda")

@section('content')

<!-- Hero Kontak -->
<section class="relative bg-cover bg-center text-white py-20 md:py-28"
    style="background-image: url('https://images.unsplash.com/photo-1581093588401-6d6f01c75631?q=80&w=1480&auto=format&fit=crop');">
    
    <div class="absolute inset-0 bg-blue-900/70"></div>

    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Kontak Kami</h1>
        <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
            Hubungi kami untuk informasi, pertanyaan, atau bantuan terkait Stikes Dian Husada
        </p>
        <nav class="flex justify-center text-sm mt-6 space-x-2 text-blue-200">
            <a href="/" class="hover:underline hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Kontak</span>
        </nav>
    </div>
</section>

<!-- Kontak & Form -->
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4 grid lg:grid-cols-2 gap-12">

    <!-- Informasi Kontak -->
    <div class="space-y-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Informasi Kontak</h2>
      <p class="text-gray-600">Silakan hubungi kami melalui informasi berikut. Kami siap membantu Anda dengan cepat dan profesional.</p>
      
      <ul class="space-y-4 text-gray-700">
        <li class="flex items-center gap-3">
          <span class="text-blue-500 text-xl">📍</span>
          <span>Jl. Raya Teras No.4, Dimoro, Tambakagung, Kec. Puri, Kabupaten Mojokerto, Jawa Timur 61364</span>
        </li>
        <li class="flex items-center gap-3">
          <span class="text-blue-500 text-xl">📞</span>
          <span>+62 812-3456-7890</span>
        </li>
        <li class="flex items-center gap-3">
          <span class="text-blue-500 text-xl">📧</span>
          <span>info@universitasmasadepan.ac.id</span>
        </li>
        <li class="flex items-center gap-3">
          <span class="text-blue-500 text-xl">⏰</span>
          <span>Senin - Jumat, 08:00 - 17:00 WIB</span>
        </li>
      </ul>

      <!-- Map Embed -->
      <div class="mt-6 rounded-xl overflow-hidden shadow">
       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63290.61076720917!2d112.4589729!3d-7.5023869!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e780dafa426b129%3A0x7200396f7295cdc8!2sSTIKES%20Dian%20Husada%20Mojokerto!5e0!3m2!1sid!2sid!4v1760104651207!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>

    <!-- Form Kontak -->
    <div class="bg-white rounded-2xl shadow p-8">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Kirim Pesan</h2>
      <form action="#" method="POST" class="space-y-4">
        <div>
          <label class="block text-gray-700 text-sm mb-1" for="name">Nama</label>
          <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none" placeholder="Nama lengkap">
        </div>
        <div>
          <label class="block text-gray-700 text-sm mb-1" for="email">Email</label>
          <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none" placeholder="Email aktif">
        </div>
        <div>
          <label class="block text-gray-700 text-sm mb-1" for="message">Pesan</label>
          <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:outline-none" placeholder="Tulis pesan Anda..."></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 transition">Kirim Pesan</button>
      </form>
    </div>

  </div>
</section>

@endsection
