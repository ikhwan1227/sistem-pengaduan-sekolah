@php
    $menuItems = [
        ['name' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'route' => 'student.dashboard', 'active' => request()->routeIs('student.dashboard')],
        ['name' => 'Buat Pengaduan', 'icon' => 'M12 4v16m8-8H4', 'route' => 'complaint.index', 'active' => request()->routeIs('complaint.index')],
        ['name' => 'Histori Pengaduan', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'route' => 'complaint.history', 'active' => request()->routeIs('complaint.history')],
        ['name' => 'Ringkasan & Tips', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'route' => 'student.tips', 'active' => request()->routeIs('student.tips')],
        ['name' => 'Bantuan', 'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'route' => '#', 'active' => false],
    ];
@endphp

<div x-data="app()" 
     @mouseenter="if(!sidebarLocked) sidebarHover = true" 
     @mouseleave="if(!sidebarLocked) sidebarHover = false"
     :class="{ 'w-52': sidebarOpen, 'w-14': !sidebarOpen }" 
     class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-200 flex flex-col flex-shrink-0 h-full">
    
    <!-- Logo Area -->
    <div class="h-16 flex items-center justify-between px-3 border-b border-gray-200 dark:border-gray-700 flex-shrink-0">
        <div x-show="sidebarOpen" class="flex items-center space-x-2" x-cloak>
            <div class="w-7 h-7 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <span class="font-bold text-gray-800 dark:text-white text-sm">Siswa Panel</span>
        </div>
        <div x-show="!sidebarOpen" class="flex justify-center w-full" x-cloak>
            <div class="w-7 h-7 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
        
        <!-- Tombol Lock/Unlock (Radio Button Style) -->
        <button @click="toggleLock()" 
                :class="{ 'bg-blue-100 dark:bg-blue-900/50 text-blue-600': sidebarLocked, 'bg-gray-100 dark:bg-gray-700 text-gray-500': !sidebarLocked }"
                class="w-6 h-6 rounded-full flex items-center justify-center transition-colors hover:bg-gray-200 dark:hover:bg-gray-600">
            <svg x-show="sidebarLocked" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            <svg x-show="!sidebarLocked" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2" />
            </svg>
        </button>
    </div>
    
    <!-- Menu Items - Flex grow untuk mendorong footer ke bawah -->
    <nav class="flex-1 mt-4 px-2 space-y-1 overflow-y-auto">
        @foreach($menuItems as $item)
            <a href="{{ $item['route'] == '#' ? '#' : route($item['route']) }}" 
               class="flex items-center px-2 py-2 rounded-lg transition-colors duration-200 group
                      {{ $item['active'] 
                          ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400' 
                          : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                </svg>
                <span x-show="sidebarOpen" class="ml-3 text-xs font-medium whitespace-nowrap" x-cloak>{{ $item['name'] }}</span>
            </a>
        @endforeach
    </nav>
    
    <!-- Tips Ringkas di Sidebar -->
    <div x-show="sidebarOpen" class="mx-2 mb-2 p-2 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex-shrink-0" x-cloak>
        <p class="text-xs font-semibold text-blue-600 dark:text-blue-400 flex items-center">
            <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Tips Cepat
        </p>
        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
            Deskripsikan masalah dengan detail agar cepat ditindaklanjuti.
        </p>
    </div>
    
    <!-- User Info Bottom -->
    <div class="p-2 border-t border-gray-200 dark:border-gray-700 flex-shrink-0">
        <div x-show="sidebarOpen" class="flex items-center space-x-2" x-cloak>
            <div class="w-7 h-7 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center text-white text-xs font-semibold">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-medium text-gray-700 dark:text-gray-300 truncate">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-[10px] text-gray-500 dark:text-gray-400 truncate">
                    {{ auth()->user()->email }}
                </p>
            </div>
        </div>
        <div x-show="!sidebarOpen" class="flex justify-center" x-cloak>
            <div class="w-7 h-7 rounded-full bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center text-white text-xs font-semibold">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>