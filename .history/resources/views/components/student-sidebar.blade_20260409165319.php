@php
    $menuItems = [
        ['name' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'route' => 'complaint.index', 'active' => request()->routeIs('complaint.index')],
        ['name' => 'Histori Pengaduan', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'route' => 'complaint.index', 'active' => request()->routeIs('complaint.index')],
        ['name' => 'Bantuan', 'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'route' => '#', 'active' => false],
    ];
@endphp

<div x-data="{ sidebarOpen: true }" 
     :class="{ 'w-64': sidebarOpen, 'w-20': !sidebarOpen }" 
     class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-300 flex flex-col">
    
    <!-- Logo Area -->
    <div class="h-16 flex items-center justify-between px-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <span x-show="sidebarOpen" class="font-bold text-gray-800 dark:text-white text-lg">Siswa Panel</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg x-show="sidebarOpen" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
            <svg x-show="!sidebarOpen" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
            </svg>
        </button>
    </div>
    
    <!-- Menu Items -->
    <nav class="flex-1 mt-6 px-2 space-y-1">
        @foreach($menuItems as $item)
            <a href="{{ $item['route'] == '#' ? '#' : route($item['route']) }}" 
               class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200 group
                      {{ $item['active'] 
                          ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400' 
                          : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3 text-sm font-medium whitespace-nowrap">{{ $item['name'] }}</span>
            </a>
        @endforeach
    </nav>
    
    <!-- User Info Bottom -->
    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <div x-show="sidebarOpen" class="flex items-center space-x-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center text-white text-sm font-semibold">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                    {{ auth()->user()->email }}
                </p>
            </div>
        </div>
        <div x-show="!sidebarOpen" class="flex justify-center">
            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center text-white text-sm font-semibold">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>
    </div>
</div>