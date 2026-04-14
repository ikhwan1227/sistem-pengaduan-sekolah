<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pengaduan Sekolah') }} - Student Panel</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Chart.js untuk grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 transition-colors duration-200">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('components.student-sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <!-- Mobile menu button -->
                        <div class="flex items-center lg:hidden">
                            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Page Title -->
                        <div class="flex-1 flex items-center justify-center lg:justify-start">
                            <h1 class="text-xl font-semibold text-gray-800 dark:text-white">
                                @yield('title', 'Dashboard Siswa')
                            </h1>
                        </div>
                        
                        <!-- Right side -->
                        <div class="flex items-center space-x-3">
                            <!-- Dark Mode Toggle -->
                            <button @click="darkMode = !darkMode" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                                <svg x-show="darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </button>
                            
                            <!-- Notifikasi -->
                            <div class="relative" x-data="{ notifOpen: false }">
                                <button @click="notifOpen = !notifOpen" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors relative">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    @php
                                        $unreadCount = auth()->user() ? auth()->user()->unreadNotifications->count() : 0;
                                    @endphp
                                    @if($unreadCount > 0)
                                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                                    @endif
                                </button>
                                
                                <div x-show="notifOpen" @click.away="notifOpen = false" class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-md shadow-lg py-2 z-50 border border-gray-200 dark:border-gray-700">
                                    <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Notifikasi Terbaru</h3>
                                    </div>
                                    <div class="max-h-96 overflow-y-auto">
                                        @forelse(auth()->user()->notifications ?? [] as $notif)
                                            <div class="px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $notif->data['message'] ?? 'Tidak ada pesan' }}</p>
                                                <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() ?? '' }}</p>
                                            </div>
                                        @empty
                                            <div class="px-4 py-3 text-center text-gray-500 dark:text-gray-400 text-sm">
                                                Tidak ada notifikasi baru
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            
                            <!-- User Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 hidden sm:block">
                                        {{ auth()->user()->name }}
                                    </span>
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                
                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                                    <!-- Profil Singkat Siswa -->
                                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800 dark:text-white">{{ auth()->user()->name }}</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                                                <p class="text-xs text-blue-600 dark:text-blue-400 mt-1">Siswa Aktif</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <svg class="inline w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Edit Profile
                                    </a>
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg class="inline w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 lg:p-6">
                <div class="max-w-7xl mx-auto">
                    @if(session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mb-4 bg-green-100 dark:bg-green-800 border-l-4 border-green-500 text-green-700 dark:text-green-200 p-4 rounded shadow">
                            <div class="flex items-center justify-between">
                                <span>✅ {{ session('success') }}</span>
                                <button @click="show = false" class="text-green-700 dark:text-green-200">&times;</button>
                            </div>
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="mb-4 bg-red-100 dark:bg-red-800 border-l-4 border-red-500 text-red-700 dark:text-red-200 p-4 rounded shadow">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>❌ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('app', () => ({
                sidebarOpen: window.innerWidth >= 1024
            }))
        })
    </script>
</body>
</html>