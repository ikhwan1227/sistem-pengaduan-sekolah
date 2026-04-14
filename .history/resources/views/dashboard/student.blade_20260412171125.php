@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">
    
    {{-- ================= STATS CARD DENGAN ICON ================= --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
        <!-- Total -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Total Pengaduan</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalPengaduan }}</p>
                </div>
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 text-[10px] text-gray-400">Semua waktu</div>
        </div>
        
        <!-- Bulan Ini -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalBulanIni }}</p>
                </div>
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 text-[10px] text-gray-400">{{ now()->format('F Y') }}</div>
        </div>
        
        <!-- Diproses -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Diproses</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $diproses }}</p>
                </div>
                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round"stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 text-[10px] text-gray-400">Sedang ditangani</div>
        </div>
        
        <!-- Selesai -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Selesai</p>
                    <p class="text-2xl font-bold text-green-600">{{ $selesai }}</p>
                </div>
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 text-[10px] text-gray-400">Telah selesai</div>
        </div>
        
        <!-- Ditolak -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Ditolak</p>
                    <p class="text-2xl font-bold text-red-600">{{ $ditolak }}</p>
                </div>
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 text-[10px] text-gray-400">Tidak diproses</div>
        </div>
    </div>
    
    {{-- ================= LAYOUT 2 KOLOM ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
        
        {{-- ================= KOLOM KIRI: HISTORY PENGAduAN ================= --}}
        <div class="lg:col-span-7">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-800/50">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-gray-800 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            History Pengaduan
                        </h3>
                        <a href="{{ route('complaint.history') }}" 
                           class="text-xs text-blue-500 hover:text-blue-600 flex items-center gap-1">
                            Lihat semua
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-[500px] overflow-y-auto">
                    @forelse($pengaduanTerbaru as $pengaduan)
                        <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-all duration-200 group">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 flex-wrap mb-2">
                                        <h4 class="font-medium text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                            {{ $pengaduan->judul }}
                                        </h4>
                                        
                                        <!-- Badge Status -->
                                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                            @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400
                                            @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400
                                            @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400
                                            @else bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400
                                            @endif">
                                            @if($pengaduan->status == 'pending')
                                                ⏳ Menunggu
                                            @elseif($pengaduan->status == 'diproses')
                                                🔄 Diproses
                                            @elseif($pengaduan->status == 'selesai')
                                                ✅ Selesai
                                            @else
                                                ❌ Ditolak
                                            @endif
                                        </span>
                                    </div>
                                    
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2 line-clamp-2">
                                        {{ Str::limit($pengaduan->deskripsi, 100) }}
                                    </p>
                                    
                                    <div class="flex items-center gap-3 text-xs text-gray-400">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d M Y') }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                            {{ $pengaduan->category->nama_kategori }}
                                        </span>
                                        @if($pengaduan->feedbacks->count() > 0)
                                            <span class="flex items-center gap-1 text-green-500">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                                Ada balasan
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <a href="{{ route('complaint.history') }}" 
                                   class="text-blue-500 text-xs hover:underline ml-3 opacity-0 group-hover:opacity-100 transition">
                                    Detail →
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <div class="w-16 h-16 mx-auto mb-3 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-500 dark:text-gray-400">Belum ada pengaduan</p>
                            <a href="{{ route('complaint.index') }}" class="inline-block mt-3 text-sm text-blue-500 hover:underline">
                                Buat pengaduan pertama →
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        {{-- ================= KOLOM KANAN: QUICK ACTION + PROGRESS ================= --}}
        <div class="lg:col-span-5 flex flex-col gap-5">
            
            {{-- QUICK ACTION CARD --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-800/50">
                    <h3 class="font-semibold text-gray-800 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Action
                    </h3>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-3 gap-3">
                        <a href="{{ route('complaint.index') }}" 
                           class="flex flex-col items-center gap-2 p-3 bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl transition-all duration-200 group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="text-xs font-medium">Buat</span>
                        </a>
                        
                        <a href="{{ route('complaint.history') }}" 
                           class="flex flex-col items-center gap-2 p-3 bg-gradient-to-br from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white rounded-xl transition-all duration-200 group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span class="text-xs font-medium">Histori</span>
                        </a>
                        
                        <a href="{{ route('student.tips') }}" 
                           class="flex flex-col items-center gap-2 p-3 bg-gradient-to-br from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-xl transition-all duration-200 group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-xs font-medium">Tips</span>
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- PROGRESS & TIMELINE CARD --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-800/50">
                    <h3 class="font-semibold text-gray-800 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        {{-- Progress Bar dengan Animasi --}}
                        <div class="mb-5">
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-2">
                                <span>Progress Penyelesaian</span>
                                <span class="font-bold text-blue-600 dark:text-blue-400">
                                    {{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 overflow-hidden">
                                <div class="{{ $latestComplaint->getProgressColorAttribute() ?? 'bg-blue-500' }} h-3 rounded-full transition-all duration-1000 ease-out"
                                     style="width: {{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%">
                                </div>
                            </div>
                        </div>
                        
                        {{-- Timeline Visual --}}
                        <div class="mb-5">
                            <div class="flex justify-between mb-2">
                                <div class="text-center flex-1">
                                    <div class="w-8 h-8 mx-auto rounded-full flex items-center justify-center text-sm font-semibold
                                        {{ $latestComplaint->status == 'pending' || $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                            ? 'bg-yellow-500 text-white shadow-lg' 
                                            : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                        1
                                    </div>
                                    <span class="text-[10px] text-gray-500 block mt-1">Menunggu</span>
                                </div>
                                <div class="flex-1 h-0.5 mt-4 mx-1 
                                    {{ $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                        ? 'bg-blue-500' 
                                        : 'bg-gray-200 dark:bg-gray-700' }}">
                                </div>
                                <div class="text-center flex-1">
                                    <div class="w-8 h-8 mx-auto rounded-full flex items-center justify-center text-sm font-semibold
                                        {{ $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                            ? 'bg-blue-500 text-white shadow-lg' 
                                            : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                        2
                                    </div>
                                    <span class="text-[10px] text-gray-500 block mt-1">Diproses</span>
                                </div>
                                <div class="flex-1 h-0.5 mt-4 mx-1 
                                    {{ $latestComplaint->status == 'selesai' 
                                        ? 'bg-green-500' 
                                        : 'bg-gray-200 dark:bg-gray-700' }}">
                                </div>
                                <div class="text-center flex-1">
                                    <div class="w-8 h-8 mx-auto rounded-full flex items-center justify-center text-sm font-semibold
                                        {{ $latestComplaint->status == 'selesai' 
                                            ? 'bg-green-500 text-white shadow-lg' 
                                            : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                        3
                                    </div>
                                    <span class="text-[10px] text-gray-500 block mt-1">Selesai</span>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Informasi Pengaduan Aktif --}}
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl p-4 border border-blue-100 dark:border-blue-800">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800 dark:text-white text-sm">
                                        {{ $latestComplaint->judul }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        Status: 
                                        <span class="font-semibold 
                                            @if($latestComplaint->status == 'pending') text-yellow-600
                                            @elseif($latestComplaint->status == 'diproses') text-blue-600
                                            @else text-green-600
                                            @endif">
                                            {{ ucfirst($latestComplaint->status) }}
                                        </span>
                                    </p>
                                    @if($latestComplaint->feedbacks->count() > 0)
                                        <div class="mt-2 pt-2 border-t border-blue-100 dark:border-blue-800">
                                            <p class="text-xs text-green-600 dark:text-green-400 flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                                {{ Str::limit($latestComplaint->feedbacks->last()->pesan, 80) }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    @else
                        <div class="text-center py-6">
                            <div class="w-16 h-16 mx-auto mb-3 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada pengaduan aktif</p>
                            <a href="{{ route('complaint.index') }}" class="inline-block mt-2 text-sm text-blue-500 hover:underline">
                                Mulai buat pengaduan
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            {{-- TIPS CARD (Tambahan agar tidak kosong) --}}
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl p-4 border border-purple-200 dark:border-purple-800">
                <div class="flex items-start gap-3">
                    <div class="text-2xl">{{ $randomTips['icon'] ?? '💡' }}</div>
                    <div>
                        <h4 class="text-sm font-semibold text-purple-700 dark:text-purple-400">{{ $randomTips['title'] ?? 'Tips Cepat' }}</h4>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">{{ $randomTips['content'] ?? 'Deskripsikan masalah dengan detail agar cepat ditindaklanjuti.' }}</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    /* Animasi progress bar */
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection