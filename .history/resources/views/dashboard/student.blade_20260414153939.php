@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
{{-- Style inline untuk memaksa layout --}}
<style>
    .dashboard-layout {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 1.5rem !important;
        align-items: stretch !important;
    }
    .dashboard-col {
        min-width: 0 !important;
        display: flex !important;
        flex-direction: column !important;
    }
    .stats-container {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 0.75rem !important;
        flex: 1 !important;
    }
    @media (max-width: 768px) {
        .dashboard-layout {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<div class="space-y-6 px-4 md:px-6 lg:px-8">
    
    {{-- ================= SECTION 1: TIPS & PANDUAN (KIRI) + STATSCARD (KANAN) ================= --}}
    <div class="dashboard-layout">
        
        {{-- KOLOM KIRI: Tips & Panduan --}}
        {{-- KOLOM KIRI: Tips & Panduan --}}
<div class="dashboard-col" x-data="tipsSlider()" x-init="initSlider()">
    <div class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-indigo-950/30 dark:via-purple-950/30 dark:to-pink-950/30 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.2)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.3)] transition-all duration-300 border border-indigo-200 dark:border-indigo-800 overflow-hidden flex flex-col h-full">
        
        {{-- Header --}}
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
        
        {{-- Content Slider --}}
        <div class="flex-1 p-5 transition-colors duration-300" :style="'background-color: ' + getBodyBgColor(currentIndex)">
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + currentIndex * 100 + '%)'">
                    <template x-for="(tip, index) in tips" :key="index">
                        <div class="w-full flex-shrink-0">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                                <div class="text-center mb-4">
                                    <span class="text-6xl" x-text="tip.icon"></span>
                                </div>
                                <h4 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white" x-text="tip.title"></h4>
                                <p class="text-sm text-center leading-relaxed text-gray-600 dark:text-gray-300" x-text="tip.content"></p>
                                <div class="mt-5 flex justify-center">
                                    <span class="text-[11px] px-3 py-1.5 rounded-full font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        💡 Tips #<span x-text="index + 1"></span> • Bermanfaat untuk Anda
                                    </span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        
        {{-- Footer dengan Panah Kiri, Dots, Panah Kanan --}}
        <div class="px-5 py-3 border-t border-indigo-200 dark:border-indigo-800 transition-colors duration-300" :style="'background-color: ' + getFooterBgColor(currentIndex)">
            <div class="flex items-center justify-center gap-3">
                {{-- Tombol Prev --}}
                <button @click="prev()" class="w-7 h-7 rounded-full bg-white dark:bg-gray-800 shadow-md flex items-center justify-center hover:scale-110 transition-all duration-300 border border-gray-200 dark:border-gray-600">
                    <svg class="w-3.5 h-3.5 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                {{-- Dots Navigation (HANYA SATU SET) --}}
                <div class="flex items-center gap-2">
                    <template x-for="(tip, index) in tips" :key="index">
                        <button @click="currentIndex = index" 
                                class="rounded-full transition-all duration-300 h-2"
                                :class="currentIndex === index ? 'w-6 bg-[#2563eb] shadow-sm' : 'w-2 bg-white hover:bg-white/80'">
                        </button>
                    </template>
                </div>
                
                {{-- Tombol Next --}}
                <button @click="next()" class="w-7 h-7 rounded-full bg-white dark:bg-gray-800 shadow-md flex items-center justify-center hover:scale-110 transition-all duration-300 border border-gray-200 dark:border-gray-600">
                    <svg class="w-3.5 h-3.5 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
        
        {{-- KOLOM KANAN: Stats Card --}}
        <div class="dashboard-col">
            <div class="stats-container">
                <!-- Total -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
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
                <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
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
                
                <!-- Selesai -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
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
                
                <!-- Diproses -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
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
                
                <!-- Ditolak -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
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
                
                <!-- DRAFT -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-[0_4px_20px_rgba(37,99,235,0.15)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Draft</p>
                            <p class="text-2xl font-bold text-gray-500 dark:text-gray-400">{{ $draft ?? 0 }}</p>
                        </div>
                        <div class="w-8 h-8 bg-gray-100 dark:bg-gray-700/50 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Belum dikirim</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= SECTION 2: QUICK ACTION + PROGRESS (KIRI) DAN HISTORY (KANAN) ================= --}}
    <div class="dashboard-layout">
        
        {{-- KOLOM KIRI: Quick Action + Progress --}}
        <div class="dashboard-col flex flex-col gap-6">
            <!-- QUICK ACTION -->
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
            
            <!-- PROGRESS & TIMELINE -->
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
        <div class="dashboard-col">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col h-full">
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
</div>

<script>
    function studentTipsSlider() {
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
            },
            
            getBodyBgColor(index) {
                const colors = {
                    0: '#DBEAFE',  // blue-100
                    1: '#DCFCE7',  // green-100
                    2: '#F3E8FF',  // purple-100
                    3: '#FFEDD5',  // orange-100
                    4: '#FCE7F3',  // pink-100
                    5: '#CCFBF1',  // teal-100
                    6: '#E0E7FF',  // indigo-100
                    7: '#FEE2E2'   // red-100
                };
                return colors[index] || '#F3F4F6';
            },
            
            getFooterBgColor(index) {
                const colors = {
                    0: '#BFDBFE',  // blue-200
                    1: '#BBF7D0',  // green-200
                    2: '#E9D5FF',  // purple-200
                    3: '#FED7AA',  // orange-200
                    4: '#FBCFE8',  // pink-200
                    5: '#99F6E4',  // teal-200
                    6: '#C7D2FE',  // indigo-200
                    7: '#FECACA'   // red-200
                };
                return colors[index] || '#E5E7EB';
            }
        }
    }
</script>
@endsection