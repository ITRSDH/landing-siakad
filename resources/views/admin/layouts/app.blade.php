<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white flex flex-col">
        <div class="p-4 text-2xl font-bold border-b border-blue-800">
            <a href="{{ url('/') }}">Admin Panel</a>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('landingcontent.index') }}" class="block px-3 py-2 rounded-lg hover:bg-blue-800 {{ request()->is('landingcontent*') ? 'bg-blue-800' : '' }}">
                Landing Content
            </a>
            <a href="{{ route('berita.index') ?? '#' }}" class="block px-3 py-2 rounded-lg hover:bg-blue-800">
                Berita
            </a>
            <a href="{{ route('galeri.index') ?? '#' }}" class="block px-3 py-2 rounded-lg hover:bg-blue-800">
                Galeri
            </a>
            <a href="{{ route('faq.index') ?? '#' }}" class="block px-3 py-2 rounded-lg hover:bg-blue-800">
                FAQ
            </a>
        </nav>

        <div class="p-4 border-t border-blue-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">@yield('page_title', 'Dashboard')</h1>
            <span class="text-sm text-gray-600">Login sebagai: <strong>{{ Auth::user()->name ?? 'Admin' }}</strong></span>
        </header>

        <!-- Content -->
        <section class="flex-1 p-6">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </section>
    </main>

</body>
</html>
