<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <nav x-data="{ open: true }" class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <div :class="open ? 'w-64' : 'w-20'"
            class="transition-all duration-300 flex flex-col bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">

            <!-- Logo & Toggle -->
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span x-show="open" class="ml-2 font-semibold text-gray-700 dark:text-gray-200">Dashboard</span>
                </a>
                <button @click="open = !open" class="text-gray-500 dark:text-gray-400 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>
            </div>


            <!-- Navigation Links -->
            <div class="flex-1 overflow-y-auto">
                <ul class="p-2 space-y-1 text-sm text-gray-700 dark:text-gray-300">

                    <li>
                        <a href="{{ route('landingcontent.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('landingcontent.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Landing</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profilkampus.edit') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('profilkampus.edit') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Profil Kampus</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengumuman.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('pengumuman.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Pengumuman</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('berita.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('galeri.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('galeri.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Galeri</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('faq.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Faq</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('beasiswa.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('beasiswa.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">Beasiswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ormawa.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('ormawa.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">ormawa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('prestasi.index') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('prestasi.index') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                            </svg>
                            <span x-show="open" class="ml-3">prestasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 
                                   {{ request()->routeIs('profile.edit') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A7 7 0 1118.88 7.195a7 7 0 01-13.758 10.61z" />
                            </svg>
                            <span x-show="open" class="ml-3">Profile</span>
                        </a>
                    </li>



                </ul>
            </div>

            <!-- User Menu -->
            <div class="border-t dark:border-gray-700 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                            alt="avatar">
                    </div>
                    <div x-show="open" class="ml-3">
                        <div class="font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center p-2 rounded-md text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                        </svg>
                        <span x-show="open" class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            <header class="sticky top-0 bg-white dark:bg-gray-800 shadow p-4 flex items-center">
                <h1 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $header ?? 'Dashboard' }}
                </h1>
            </header>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-100 dark:bg-gray-900">
               @yield('content')
            </main>
        </div>
    </nav>
     @stack('scripts')
</body>

</html>