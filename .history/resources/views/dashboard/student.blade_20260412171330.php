@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">
    
    {{-- ================= STATS CARD (FLEX - PASTI BERDERET) ================= --}}
    <div class="flex flex-wrap md:flex-nowrap gap-3">
        <!-- Total -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200">
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
            <div class="mt-1 text-[9px] text-gray-400">Semua waktu</div>
        </div>
        
        <!-- Bulan Ini -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200">
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
            <div class="mt-1 text-[9px] text-gray-400">{{ now()->format('F Y') }}</div>
        </div>
        
        <!-- Diproses -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Diproses</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $diproses }}</p>
                </div>
                <div class="w-8 h-8 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-gray-400">Sedang ditangani</div>
        </div>
        
        <!-- Selesai -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Selesai</p>
                    <p class="text-2xl font-bold text-green-600">{{ $selesai }}</p>
                </div>
                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-gray-400">Telah selesai</div>
        </div>
        
        <!-- Ditolak -->
        <div class="flex-1 min-w-[100px] bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-gray-500 dark:text-gray-400">Ditolak</p>
                    <p class="text-2xl font-bold text-red-600">{{ $ditolak }}</p>
                </div>
                <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-gray-400">Tidak diproses</div>
        </div>
    </div>

    {{-- ================= LAYOUT 2 KOLOM (History | Quick Action + Progress) ================= --}}
    <div class="flex flex-col lg:flex-row gap-5">
        
        {{-- ================= KOLOM KIRI: HISTORY PENGAduAN ================= --}}
        <div class="flex-1 lg:w-2/3">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                            <svg class="w-4 h-4 mr-1.5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            History Pengaduan
                        </h3>
                        <a href="{{ route('complaint.history') }}" class="text-[10px] text-blue-500 hover:underline">
                            Lihat semua →
                        </a>
                    </div>
                </div>
                
                <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-[450px] overflow-y-auto">
                    @forelse($pengaduanTerbaru as $pengaduan)
                        <div class="p-3 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <div class="flex items-center gap-1.5 flex-wrap mb-1">
                                        <h4 class="font-medium text-sm text-gray-800 dark:text-white">
                                            {{ $pengaduan->judul }}
                                        </h4>
                                        <span class="text-[10px] px-1.5 py-0.5 rounded-full font-medium
                                            @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700
                                            @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </div>
                                    <p class="text-[11px] text-gray-500 dark:text-gray-400 mb-1">
                                        {{ Str::limit($pengaduan->deskripsi, 80) }}
                                    </p>
                                    <div class="flex items-center gap-2 text-[9px] text-gray-400">
                                        <span>{{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }}</span>
                                        <span>•</span>
                                        <span>{{ $pengaduan->category->nama_kategori }}</span>
                                        @if($pengaduan->feedbacks->count() > 0)
                                            <span class="text-green-500">• Ada balasan</span>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('complaint.history') }}" class="text-blue-500 text-[10px] ml-2 opacity-0 group-hover:opacity-100 transition">Detail</a>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-sm">Belum ada pengaduan</p>
                            <a href="{{ route('complaint.index') }}" class="inline-block mt-2 text-xs text-blue-500 hover:underline">Buat pengaduan</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        {{-- ================= KOLOM KANAN: QUICK ACTION + PROGRESS ================= --}}
        <div class="flex-1 lg:w-1/3 flex flex-col gap-4">
            
            {{-- QUICK ACTION --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Action
                    </h3>
                </div>
                <div class="p-3">
                    <div class="flex gap-2">
                        <a href="{{ route('complaint.index') }}" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Buat
                        </a>
                        <a href="{{ route('complaint.history') }}" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-lg transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Histori
                        </a>
                        <a href="{{ route('student.tips') }}" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tips
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- PROGRESS & TIMELINE --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
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
                        {{-- Progress Bar --}}
                        <div class="mb-3">
                            <div class="flex justify-between text-[10px] text-gray-600 dark:text-gray-400 mb-1">
                                <span>Progress</span>
                                <span class="font-semibold text-blue-600">{{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                <div class="{{ $latestComplaint->getProgressColorAttribute() ?? 'bg-blue-500' }} h-2 rounded-full transition-all duration-500"
                                     style="width: {{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%">
                                </div>
                            </div>
                        </div>
                        
                        {{-- Timeline Text --}}
                        <div class="flex justify-between text-[9px] text-gray-500 dark:text-gray-400 mb-3">
                            <span>Menunggu</span>
                            <span>Diproses</span>
                            <span>Selesai</span>
                        </div>
                        
                        {{-- Info Pengaduan --}}
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-2">
                            <p class="text-xs font-medium text-gray-800 dark:text-white truncate">
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
                            @if($latestComplaint->feedbacks->count() > 0)
                                <p class="text-[9px] text-green-600 dark:text-green-400 mt-1 truncate">
                                    💬 {{ Str::limit($latestComplaint->feedbacks->last()->pesan, 60) }}
                                </p>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-4">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-xs text-gray-500">Belum ada pengaduan</p>
                            <a href="{{ route('complaint.index') }}" class="inline-block mt-1 text-[10px] text-blue-500">Buat pengaduan</a>
                        </div>
                    @endif
                </div>
            </div>
            
            {{-- TIPS CARD --}}
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl p-3 border border-purple-200 dark:border-purple-800">
                <div class="flex items-start gap-2">
                    <div class="text-xl">{{ $randomTips['icon'] ?? '💡' }}</div>
                    <div>
                        <h4 class="text-xs font-semibold text-purple-700 dark:text-purple-400">{{ $randomTips['title'] ?? 'Tips Cepat' }}</h4>
                        <p class="text-[10px] text-gray-600 dark:text-gray-400 mt-0.5">{{ $randomTips['content'] ?? 'Deskripsikan masalah dengan detail agar cepat ditindaklanjuti.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection