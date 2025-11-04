<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- SEO Dummy -->
    <title>STIKES Dian Husada Mojokerto | Sekolah Tinggi Ilmu Kesehatan Terakreditasi</title>


    <!-- Fonts & CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-[Poppins] home-page">

    @include('landingbaru.layout.navigation')
    @yield('content')
    @include('landingbaru.layout.footer')

    <!-- WhatsApp Button Dummy
    <div class="fixed right-4 bottom-4 z-50">
        <a
            href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20bertanya"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat via WhatsApp"
            class="group relative flex items-center justify-center w-14 h-14 md:w-16 md:h-16 rounded-full shadow-lg bg-green-500 hover:bg-green-600 active:scale-95 transition-transform duration-150 focus:outline-none focus:ring-2 focus:ring-green-300">
            <i class="fab fa-whatsapp text-white text-2xl md:text-3xl"></i>
        </a>
    </div> -->

    <!-- Back to Top
    <button id="backToTop" class="fixed bottom-24 right-4 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 opacity-0 invisible z-40">
        <i class="fas fa-arrow-up"></i>
    </button> -->

    @stack('scripts')
</body>

</html>