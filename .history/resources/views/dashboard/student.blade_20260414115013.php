@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
{{-- Tambahan margin horizontal (px-4 md:px-6 lg:px-8) agar konten tidak terlalu melebar --}}
<div class="space-y-6 px-4 md:px-6 lg:px-8">
    
    {{-- ================= ROW 1: TIPS CARD (KIRI) + STATS CARD (KANAN) ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- KIRI: Tips & Panduan (style asli, tidak berubah) --}}
        <div>
            <div class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-indigo-950/30 dark:via-purple-950/30 dark:to-pink-950/30 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.2)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.3)] transition-all duration-300 border border-indigo-200 dark:border-indigo-800 overflow-hidden">
                <div class="px-5 py-3 border-b border-indigo-200 dark:border-indigo-800 bg-white/50 dark:bg-gray-800/30">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 dark:text-white text-lg">Tips & Panduan</h3>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Cara membuat pengaduan yang efektif</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-5" x-data="tipsSlider()" x-init="initSlider()">
                    <div class="relative overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + currentIndex * 100 + '%)'">
                            <template x-for="(tip, index) in tips" :key="index">
                                <div class="w-full flex-shrink-0 px-1">
                                    <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-md border border-indigo-100 dark:border-indigo-800">
                                        <div class="flex items-start gap-4">
                                            <div class="text-4xl drop-shadow-lg" x-text="tip.icon"></div>
                                            <div class="flex-1">
                                                <h4 class="text-base font-bold text-gray-800 dark:text-white" x-text="tip.title"></h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 leading-relaxed" x-text="tip.content"></p>
                                                <div class="mt-3 flex items-center gap-2">
                                                    <span class="text-[10px] px-2 py-1 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300">💡 Tips #<span x-text="index + 1"></span></span>
                                                    <span class="text-[10px] text-gray-400">•</span>
                                                    <span class="text-[10px] text-gray-400">Bermanfaat untuk Anda</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    
                    <!-- Dots Navigation -->
                    <div class="flex justify-center gap-3 mt-5">
                        <template x-for="(tip, index) in tips" :key="index">
                            <button @click="currentIndex = index" 
                                    class="rounded-full transition-all duration-300"
                                    :class="currentIndex === index ? 'w-8 h-2 bg-indigo-500 shadow-md' : 'w-2 h-2 bg-indigo-300 dark:bg-indigo-700'">
                            </button>
                        </template>
                    </div>
                    
                    <!-- Tombol Prev/Next -->
                    <button @click="prev()" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white dark:bg-gray-800 shadow-md flex items-center justify-center hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="next()" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white dark:bg-gray-800 shadow-md flex items-center justify-center hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                
                <div class="px-5 py-3 border-t border-indigo-200 dark:border-indigo-800 bg-white/30 dark:bg-gray-800/20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                            <span class="text-[10px] text-gray-500 dark:text-gray-400">✨ Tips berganti otomatis setiap 5 detik</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="text-[10px] text-gray-400">⏱️</span>
                            <span class="text-[10px] text-gray-500 dark:text-gray-400">Tips #<span x-text="currentIndex + 1"></span>/<span x-text="tips.length"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- KANAN: Stats Cards (style asli, hanya dipindah posisinya) --}}
        <div>
            <div class="flex flex-wrap gap-3">
                <!-- Total -->
                <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Total</p>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalPengaduan }}</p>
                        </div>
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Semua waktu</div>
                </div>
                
                <!-- Bulan Ini -->
                <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Bulan Ini</p>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalBulanIni }}</p>
                        </div>
                        <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">{{ now()->format('F Y') }}</div>
                </div>
                
                <!-- Diproses -->
                <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Diproses</p>
                            <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $diproses }}</p>
                        </div>
                        <div class="w-8 h-8 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Sedang ditangani</div>
                </div>
                
                <!-- Selesai -->
                <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Selesai</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $selesai }}</p>
                        </div>
                        <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Telah selesai</div>
                </div>
                
                <!-- Ditolak -->
                <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Ditolak</p>
                            <p class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $ditolak }}</p>
                        </div>
                        <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Tidak diproses</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= JARAK ANTARA ROW ATAS DAN BAWAH ================= --}}
    <div class="mb-2"></div>

    {{-- ================= ROW 2: Quick Action + Progress (KIRI) dan History (KANAN) ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- KOLOM KIRI: Quick Action dan Progress & Timeline --}}
        <div class="flex flex-col gap-6">
            {{-- QUICK ACTION --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Action
                    </h3>
                </div>
                <div class="p-4">
                    <div class="flex gap-3">
                        <a href="{{ route('complaint.index') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2.5 text-white text-sm rounded-lg transition-all duration-200 shadow-md hover:shadow-lg" style="background-color: #2563eb;">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Buat
                        </a>
                        <a href="{{ route('complaint.history') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2.5 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Histori
                        </a>
                        <a href="{{ route('student.tips') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2.5 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tips
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- PROGRESS & TIMELINE --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Progress & Timeline
                    </h3>
                </div>
                <div class="p-4">
                    @php
                        $latestComplaint = $pengaduanTerbaru->first();
                    @endphp
                    
                    @if($latestComplaint)
                        <div class="mb-4">
                            <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 mb-1">
                                <span>Progress</span>
                                <span class="font-semibold" style="color: #2563eb;">{{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                <div class="h-2 rounded-full transition-all duration-500" style="width: {{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%; background-color: #2563eb;"></div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between text-[10px] text-gray-500 dark:text-gray-400 mb-4">
                            <span>Menunggu</span>
                            <span>Diproses</span>
                            <span>Selesai</span>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                            <div class="flex items-start gap-2">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800 dark:text-white">{{ $latestComplaint->judul }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                        Status: 
                                        <span class="font-semibold" style="color: #2563eb;">
                                            {{ ucfirst($latestComplaint->status) }}
                                        </span>
                                    </p>
                                    @if($latestComplaint->feedbacks->count() > 0)
                                        <p class="text-[11px] text-emerald-600 dark:text-emerald-400 mt-1">💬 {{ Str::limit($latestComplaint->feedbacks->last()->pesan, 60) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-sm text-gray-500">Belum ada pengaduan</p>
                            <a href="{{ route('complaint.index') }}" class="inline-block mt-2 text-xs text-indigo-500 hover:underline">Buat pengaduan</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- KOLOM KANAN: History Pengaduan --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col">
            <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <div class="flex items-center justify-between">
                    <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        History Pengaduan
                    </h3>
                    <a href="{{ route('complaint.history') }}" class="text-[10px] text-indigo-500 hover:underline">Lihat semua →</a>
                </div>
            </div>
            
            <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-[320px] overflow-y-auto flex-1">
                @forelse($pengaduanTerbaru->take(5) as $pengaduan)
                    <div class="p-3 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition duration-200">
                        <div class="flex justify-between items-start">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5 flex-wrap mb-1">
                                    <h4 class="font-medium text-sm text-gray-800 dark:text-white">{{ $pengaduan->judul }}</h4>
                                    <span class="text-[10px] px-1.5 py-0.5 rounded-full font-medium
                                        @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400
                                        @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400
                                        @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400
                                        @else bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400
                                        @endif">
                                        {{ substr($pengaduan->status, 0, 1) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }} • {{ $pengaduan->category->nama_kategori }}</p>
                                @if($pengaduan->feedbacks->count() > 0)
                                    <p class="text-[11px] text-emerald-600 dark:text-emerald-400 mt-1">💬 Ada balasan</p>
                                @endif
                            </div>
                            <a href="{{ route('complaint.history', ['id' => $pengaduan->id]) }}" class="text-indigo-500 text-[11px] ml-2 shrink-0 hover:underline">Detail</a>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                        <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-sm">Belum ada pengaduan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
    function tipsSlider() {
        return {
            tips: [
                { icon: '📝', title: 'Deskripsi yang Detail', content: 'Jelaskan masalah secara detail agar admin bisa memahami dan menindaklanjuti dengan cepat.' },
                { icon: '📸', title: 'Sertakan Foto', content: 'Lampirkan foto bukti untuk memperkuat pengaduan Anda. Foto yang jelas akan membantu tim teknis.' },
                { icon: '🏷️', title: 'Pilih Kategori Tepat', content: 'Pilih kategori yang sesuai agar pengaduan cepat diproses oleh bagian terkait.' },
                { icon: '👀', title: 'Follow Up', content: 'Pantau status pengaduan Anda secara berkala. Jika sudah 3 hari belum ada tanggapan, tanyakan melalui fitur komentar.' },
                { icon: '💬', title: 'Bahasa Santun', content: 'Sampaikan pengaduan dengan bahasa yang santun dan sopan. Komunikasi yang baik akan mempercepat penyelesaian masalah.' },
                { icon: '📍', title: 'Cantumkan Lokasi', content: 'Sertakan informasi lokasi yang jelas agar petugas bisa langsung menuju ke tempat kejadian.' },
                { icon: '🎯', title: 'Satu Pengaduan Satu Masalah', content: 'Pisahkan pengaduan yang berbeda agar lebih mudah diproses. Satu pengaduan untuk satu jenis masalah.' },
                { icon: '⏰', title: 'Laporkan Segera', content: 'Jangan menunda melaporkan masalah. Semakin cepat dilaporkan, semakin cepat pula ditangani.' }
            ],
            currentIndex: 0,
            intervalId: null,
            initSlider() {
                this.startAutoSlide();
            },
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.tips.length;
                this.resetAutoSlide();
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.tips.length) % this.tips.length;
                this.resetAutoSlide();
            },
            startAutoSlide() {
                this.intervalId = setInterval(() => { this.next(); }, 5000);
            },
            resetAutoSlide() {
                clearInterval(this.intervalId);
                this.startAutoSlide();
            }
        }
    }
</script>
@endsection