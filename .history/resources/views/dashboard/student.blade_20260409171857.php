@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
        <!-- Total Pengaduan -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Pengaduan</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalPengaduan }}</p>
                </div>
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Bulan Ini -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalBulanIni }}</p>
                </div>
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Diproses -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Diproses</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $diproses }}</p>
                </div>
                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Selesai -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Selesai</p>
                    <p class="text-2xl font-bold text-green-600">{{ $selesai }}</p>
                </div>
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Ditolak -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Ditolak</p>
                    <p class="text-2xl font-bold text-red-600">{{ $ditolak }}</p>
                </div>
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tombol Aksi Cepat & Ringkasan Tips -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Tombol Aksi Cepat -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
            <h3 class="text-md font-semibold text-gray-800 dark:text-white mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Aksi Cepat
            </h3>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('complaint.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Pengaduan Baru
                </a>
                <a href="{{ route('complaint.history') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Lihat Histori
                </a>
            </div>
        </div>
        
        <!-- Ringkasan Tips -->
        <div class="bg-gradient-to-r from-purple-50 to-indigo-50 dark:from-purple-900/20 dark:to-indigo-900/20 rounded-xl shadow-sm border border-purple-200 dark:border-purple-800 p-4">
            <div class="flex items-start space-x-3">
                <div class="text-3xl">{{ $randomTips['icon'] }}</div>
                <div>
                    <h3 class="text-sm font-semibold text-purple-700 dark:text-purple-400">{{ $randomTips['title'] }}</h3>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">{{ $randomTips['content'] }}</p>
                </div>
            </div>
            <div class="mt-3 pt-2 border-t border-purple-200 dark:border-purple-800">
                <p class="text-xs text-gray-500 dark:text-gray-500 text-center">
                    💡 Tips untuk pengaduan yang lebih baik
                </p>
            </div>
        </div>
    </div>
    
    <!-- Daftar Pengaduan Terbaru -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h3 class="text-md font-semibold text-gray-800 dark:text-white flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Pengaduan Terbaru
            </h3>
            <a href="{{ route('complaint.history') }}" class="text-xs text-blue-600 dark:text-blue-400 hover:underline">Lihat semua →</a>
        </div>
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($pengaduanTerbaru as $pengaduan)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-1">
                                <h4 class="font-medium text-gray-800 dark:text-white">{{ $pengaduan->judul }}</h4>
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold
                                    @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                                    @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                    @endif
                                ">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                {{ Str::limit($pengaduan->deskripsi, 100) }}
                            </p>
                            <div class="flex items-center space-x-3 text-xs text-gray-400">
                                <span>📅 {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }}</span>
                                <span>📂 {{ $pengaduan->category->nama_kategori }}</span>
                                @if($pengaduan->feedbacks->count() > 0)
                                    <span class="text-green-500">💬 Ada balasan</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('complaint.history') }}#complaint-{{ $pengaduan->id }}" class="text-blue-600 dark:text-blue-400 text-sm hover:underline ml-4">Detail</a>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p>Belum ada pengaduan. Buat pengaduan pertama Anda!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection