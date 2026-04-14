@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">
    <!-- Stats Cards - 5 card menderet -->
    <div class="flex flex-wrap gap-3">
        <!-- Total Pengaduan -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-lg shadow-sm p-3 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Total</p>
                    <p class="text-xl font-bold text-gray-800 dark:text-white">{{ $totalPengaduan }}</p>
                </div>
                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Bulan Ini -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-lg shadow-sm p-3 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Bulan Ini</p>
                    <p class="text-xl font-bold text-gray-800 dark:text-white">{{ $totalBulanIni }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Diproses -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-lg shadow-sm p-3 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Diproses</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $diproses }}</p>
                </div>
                <div class="w-8 h-8 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Selesai -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-lg shadow-sm p-3 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Selesai</p>
                    <p class="text-xl font-bold text-green-600">{{ $selesai }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Ditolak -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-lg shadow-sm p-3 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Ditolak</p>
                    <p class="text-xl font-bold text-red-600">{{ $ditolak }}</p>
                </div>
                <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 3 Kolom Layout: Quick Action | Progress & Timeline | History -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <!-- KOLOM 1: QUICK ACTION -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-3 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Quick Action
                </h3>
            </div>
            <div class="p-3 space-y-2">
                <a href="{{ route('complaint.index') }}" class="flex items-center justify-between w-full px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm rounded-lg transition group">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Buat Pengaduan
                    </span>
                    <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                
                <a href="{{ route('complaint.history') }}" class="flex items-center justify-between w-full px-3 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-lg transition group">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Histori Pengaduan
                    </span>
                    <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                
                <a href="{{ route('student.tips') }}" class="flex items-center justify-between w-full px-3 py-2 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg transition group">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tips & Panduan
                    </span>
                    <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- KOLOM 2: PROGRESS & TIMELINE -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-3 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Progress & Timeline
                </h3>
            </div>
            <div class="p-3">
                @php
                    $latestComplaint = $pengaduanTerbaru->first();
                @endphp
                
                @if($latestComplaint)
                    <!-- Progress Bar -->
                    <div class="mb-3">
                        <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 mb-1">
                            <span>Progress Penyelesaian</span>
                            <span>{{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="{{ $latestComplaint->getProgressColorAttribute() ?? 'bg-blue-500' }} h-2 rounded-full transition-all duration-500"
                                 style="width: {{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%"></div>
                        </div>
                    </div>
                    
                    <!-- Timeline Steps -->
                    <div class="relative mb-3">
                        <div class="flex justify-between">
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-semibold
                                    {{ $latestComplaint->status == 'pending' || $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                        ? 'bg-yellow-500 text-white' 
                                        : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                    1
                                </div>
                                <span class="text-[10px] mt-0.5 text-center">Menunggu</span>
                            </div>
                            
                            <div class="flex-1 h-0.5 mt-3 mx-0.5 
                                {{ $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                    ? 'bg-blue-500' 
                                    : 'bg-gray-200 dark:bg-gray-700' }}">
                            </div>
                            
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-semibold
                                    {{ $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                        ? 'bg-blue-500 text-white' 
                                        : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                    2
                                </div>
                                <span class="text-[10px] mt-0.5 text-center">Diproses</span>
                            </div>
                            
                            <div class="flex-1 h-0.5 mt-3 mx-0.5 
                                {{ $latestComplaint->status == 'selesai' 
                                    ? 'bg-green-500' 
                                    : 'bg-gray-200 dark:bg-gray-700' }}">
                            </div>
                            
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-semibold
                                    {{ $latestComplaint->status == 'selesai' 
                                        ? 'bg-green-500 text-white' 
                                        : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                    3
                                </div>
                                <span class="text-[10px] mt-0.5 text-center">Selesai</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Info Pengaduan Terkini -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-2">
                        <p class="text-xs font-medium text-gray-700 dark:text-gray-300 truncate">
                            {{ $latestComplaint->judul }}
                        </p>
                        <p class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5">
                            Status: 
                            <span class="font-semibold 
                                @if($latestComplaint->status == 'pending') text-yellow-600
                                @elseif($latestComplaint->status == 'diproses') text-blue-600
                                @else text-green-600
                                @endif">
                                {{ ucfirst($latestComplaint->status) }}
                            </span>
                        </p>
                    </div>
                @else
                    <div class="text-center py-4 text-gray-500 dark:text-gray-400">
                        <svg class="w-8 h-8 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-xs">Belum ada pengaduan</p>
                        <a href="{{ route('complaint.index') }}" class="inline-block mt-2 text-xs text-blue-500 hover:underline">
                            Buat pengaduan pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- KOLOM 3: HISTORY PENGAduAN (Ringkasan) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-3 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center justify-between">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        History Pengaduan
                    </span>
                    <a href="{{ route('complaint.history') }}" class="text-[10px] text-blue-500 hover:underline">Lihat semua →</a>
                </h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-gray-700 max-h-64 overflow-y-auto">
                @forelse($pengaduanTerbaru->take(3) as $pengaduan)
                    <div class="p-2.5 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5 mb-0.5">
                                    <h4 class="font-medium text-xs text-gray-800 dark:text-white truncate">
                                        {{ $pengaduan->judul }}
                                    </h4>
                                    <span class="px-1 py-0.5 rounded-full text-[9px] font-semibold shrink-0
                                        @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800
                                        @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif
                                    ">
                                        {{ ucfirst(substr($pengaduan->status, 0, 1)) }}
                                    </span>
                                </div>
                                <p class="text-[10px] text-gray-500 dark:text-gray-400 truncate">
                                    {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }} • {{ $pengaduan->category->nama_kategori }}
                                </p>
                                @if($pengaduan->feedbacks->count() > 0)
                                    <p class="text-[9px] text-green-500 mt-0.5 truncate">💬 Ada balasan</p>
                                @endif
                            </div>
                            <a href="{{ route('complaint.history') }}" class="text-blue-500 text-[9px] hover:underline ml-2 shrink-0">Detail</a>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center text-gray-500 dark:text-gray-400">
                        <svg class="w-8 h-8 mx-auto mb-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-xs">Belum ada pengaduan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    
    <!-- Tips Ringkas (Opsional, di bawah 3 kolom) -->
    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 dark:from-purple-900/20 dark:to-indigo-900/20 rounded-lg p-3 border border-purple-200 dark:border-purple-800">
        <div class="flex items-start space-x-2">
            <div class="text-lg">{{ $randomTips['icon'] ?? '💡' }}</div>
            <div>
                <h3 class="text-xs font-semibold text-purple-700 dark:text-purple-400">{{ $randomTips['title'] ?? 'Tips Cepat' }}</h3>
                <p class="text-[11px] text-gray-600 dark:text-gray-400 mt-0.5">{{ $randomTips['content'] ?? 'Deskripsikan masalah dengan detail agar cepat ditindaklanjuti.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection