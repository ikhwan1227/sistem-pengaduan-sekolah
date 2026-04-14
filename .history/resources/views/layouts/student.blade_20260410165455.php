<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    
    <style>
        /* Transition untuk dark mode */
        * {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
        
        /* Sidebar transition */
        .sidebar-transition {
            transition: width 0.2s ease-in-out;
        }
        
        /* Custom scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 4px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }
        
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        
        .dark .overflow-y-auto::-webkit-scrollbar-track {
            background: #374151;
        }
        
        .dark .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #6b7280;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.student-sidebar')
        
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Navbar -->
            <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-end h-14">
                        <!-- Page Title -->
                        <div class="flex-1 flex items-center">
                            <h1 class="text-lg font-semibold text-gray-800 dark:text-white">
                                @yield('title', 'Dashboard Siswa')
                            </h1>
                        </div>
                        
                        <!-- Right side -->
                        <div class="flex items-center space-x-2">
                            <!-- Dark Mode Toggle -->
                            <button id="darkModeToggle" 
                                    class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                                    type="button">
                                <svg id="iconMoon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                                <svg id="iconSun" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </button>
                            
                            <!-- Notifikasi -->
                            <div class="relative" id="notifContainer">
                                <button id="notifButton" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors relative">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    @php
                                        $unreadCount = auth()->user() ? auth()->user()->unreadNotifications->count() : 0;
                                    @endphp
                                    @if($unreadCount > 0)
                                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                                    @endif
                                </button>
                                
                                <div id="notifDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-md shadow-lg py-2 z-50 border border-gray-200 dark:border-gray-700">
                                    <div class="max-h-96 overflow-y-auto">
                                        @php
                                            $notifications = auth()->user()->notifications ?? collect();
                                        @endphp
                                        @forelse($notifications->take(10) as $notif)
                                            <div class="px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-700 last:border-0">
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $notif->data['message'] ?? 'Tidak ada pesan' }}</p>
                                                <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() ?? '' }}</p>
                                            </div>
                                        @empty
                                            <div class="px-4 py-6 text-center text-gray-500 dark:text-gray-400 text-sm">
                                                <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                                </svg>
                                                Belum ada notifikasi
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            
                            <!-- User Dropdown -->
                            <div class="relative" id="userDropdownContainer">
                                <button id="userDropdownButton" class="focus:outline-none">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                </button>
                                
                                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-sm">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-semibold text-gray-800 dark:text-white">{{ auth()->user()->name }}</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <svg class="w-4 h-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Edit Profile
                                    </a>
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg class="w-4 h-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <main class="flex-1 p-4 lg:p-6">
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
        // ============================================
        // DARK MODE - Vanilla JavaScript
        // ============================================
        (function() {
            const toggleBtn = document.getElementById('darkModeToggle');
            const iconMoon = document.getElementById('iconMoon');
            const iconSun = document.getElementById('iconSun');
            
            function setDarkMode(isDark) {
                if (isDark) {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('darkMode', 'true');
                    if (iconMoon) iconMoon.classList.add('hidden');
                    if (iconSun) iconSun.classList.remove('hidden');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('darkMode', 'false');
                    if (iconMoon) iconMoon.classList.remove('hidden');
                    if (iconSun) iconSun.classList.add('hidden');
                }
            }
            
            // Initialize
            const savedMode = localStorage.getItem('darkMode');
            setDarkMode(savedMode === 'true');
            
            // Event listener
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const isDark = document.documentElement.classList.contains('dark');
                    setDarkMode(!isDark);
                });
            }
        })();
        
        // ============================================
        // NOTIFICATION DROPDOWN
        // ============================================
        (function() {
            const notifButton = document.getElementById('notifButton');
            const notifDropdown = document.getElementById('notifDropdown');
            
            if (notifButton && notifDropdown) {
                notifButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    notifDropdown.classList.toggle('hidden');
                });
                
                // Close when clicking outside
                document.addEventListener('click', function(e) {
                    if (!notifButton.contains(e.target) && !notifDropdown.contains(e.target)) {
                        notifDropdown.classList.add('hidden');
                    }
                });
            }
        })();
        
        // ============================================
        // USER DROPDOWN
        // ============================================
        (function() {
            const userButton = document.getElementById('userDropdownButton');
            const userDropdown = document.getElementById('userDropdown');
            
            if (userButton && userDropdown) {
                userButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userDropdown.classList.toggle('hidden');
                });
                
                // Close when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userButton.contains(e.target) && !userDropdown.contains(e.target)) {
                        userDropdown.classList.add('hidden');
                    }
                });
            }
        })();
        
        // ============================================
        // SIDEBAR LOGIC
        // ============================================
        (function() {
            const sidebar = document.getElementById('sidebar');
            const lockBtn = document.getElementById('sidebarLockBtn');
            
            let sidebarLocked = localStorage.getItem('sidebarLocked') === 'true';
            let sidebarHover = false;
            
            function updateSidebar() {
                const isOpen = sidebarLocked || sidebarHover;
                if (sidebar) {
                    if (isOpen) {
                        sidebar.classList.remove('w-12');
                        sidebar.classList.add('w-48');
                    } else {
                        sidebar.classList.remove('w-48');
                        sidebar.classList.add('w-12');
                    }
                }
                
                // Update lock button icon
                if (lockBtn) {
                    if (sidebarLocked) {
                        lockBtn.innerHTML = '<svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>';
                        lockBtn.classList.add('bg-blue-100', 'dark:bg-blue-900/50', 'text-blue-600');
                        lockBtn.classList.remove('bg-gray-100', 'dark:bg-gray-700', 'text-gray-500');
                    } else {
                        lockBtn.innerHTML = '<svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2" /></svg>';
                        lockBtn.classList.remove('bg-blue-100', 'dark:bg-blue-900/50', 'text-blue-600');
                        lockBtn.classList.add('bg-gray-100', 'dark:bg-gray-700', 'text-gray-500');
                    }
                }
                
                // Update text visibility
                const textElements = document.querySelectorAll('.sidebar-text');
                textElements.forEach(el => {
                    if (isOpen) {
                        el.classList.remove('hidden');
                    } else {
                        el.classList.add('hidden');
                    }
                });
            }
            
            // Hover events
            if (sidebar) {
                sidebar.addEventListener('mouseenter', function() {
                    if (!sidebarLocked) {
                        sidebarHover = true;
                        updateSidebar();
                    }
                });
                
                sidebar.addEventListener('mouseleave', function() {
                    if (!sidebarLocked) {
                        sidebarHover = false;
                        updateSidebar();
                    }
                });
            }
            
            // Lock button
            if (lockBtn) {
                lockBtn.addEventListener('click', function() {
                    sidebarLocked = !sidebarLocked;
                    localStorage.setItem('sidebarLocked', sidebarLocked);
                    if (!sidebarLocked) {
                        sidebarHover = false;
                    }
                    updateSidebar();
                });
            }
            
            // Initial update
            updateSidebar();
        })();
    </script>
</body>
</html>