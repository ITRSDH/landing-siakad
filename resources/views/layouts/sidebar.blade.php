<!-- resources/views/layouts/sidebar.blade.php -->
<div class="flex flex-col flex-grow h-full">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            Laravel App
        </h2>
    </div>

    <nav class="flex-1 px-2 py-4 space-y-1 bg-white dark:bg-gray-800 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                  text-gray-700 dark:text-gray-200 
                  hover:bg-gray-200 dark:hover:bg-gray-700
                  {{ request()->routeIs('dashboard') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
            <span class="mr-3">🏠</span>
            Dashboard
        </a>

        <!-- Profile -->
        <a href="{{ route('profile.edit') }}" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                  text-gray-700 dark:text-gray-200 
                  hover:bg-gray-200 dark:hover:bg-gray-700
                  {{ request()->routeIs('profile.edit') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
            <span class="mr-3">👤</span>
            Profile
        </a>

        <!-- Settings -->
        <a href="#" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-md 
                  text-gray-700 dark:text-gray-200 
                  hover:bg-gray-200 dark:hover:bg-gray-700">
            <span class="mr-3">⚙️</span>
            Settings
        </a>
    </nav>

    <div class="border-t border-gray-200 dark:border-gray-700 p-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-500 text-white">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </span>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                    {{ Auth::user()->name ?? 'Admin' }}
                </p>
                <p class="text-xs text-gray-500">
                    {{ Auth::user()->email ?? 'admin@example.com' }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit"
                    class="flex items-center w-full px-3 py-2 text-sm font-medium text-red-600 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                <span class="mr-3">🚪</span>
                Logout
            </button>
        </form>
    </div>
</div>
