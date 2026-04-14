<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Student Panel')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen">
        <!-- Navbar Sederhana -->
        <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-14">
                    <div class="flex items-center space-x-2">
                        <span class="font-bold text-gray-800 dark:text-white text-sm">Student Panel</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('profile.edit') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:text-red-700">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Page Content -->
        <main class="p-4 lg:p-6">
            <div class="max-w-7xl mx-auto">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>