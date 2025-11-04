<nav x-data="{ open: true }" class="flex h-screen bg-gray-100 dark:bg-gray-900">

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
            <ul class="p-2 space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700 font-semibold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
                        </svg>
                        <span x-show="open" class="ml-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0H6" />
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
                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="avatar">
                </div>
                <div x-show="open" class="ml-3">
                    <div class="font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit"
                    class="flex w-full items-center p-2 rounded-lg text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700">
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

    <!-- Page Content -->
    <div class="flex-1 overflow-y-auto">
        {{ $slot }}
    </div>
</nav>