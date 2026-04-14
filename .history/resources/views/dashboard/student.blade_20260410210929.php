@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">

==============================================================================================================================================================================================================================
                                                    Stats Cards Section
==============================================================================================================================================================================================================================
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

==============================================================================================================================================================================================================================
                                                    Quick Action Card Section
==============================================================================================================================================================================================================================
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Quick Action
            </h3>
        </div>
        <div class="p-3 flex flex-wrap gap-2">
            <a href="{{ route('complaint.index') }}" class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white text-sm rounded-lg transition">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Pengaduan
            </a>
            <a href="{{ route('complaint.history') }}" class="inline-flex items-center px-3 py-1.5 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-lg transition">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Histori
            </a>
            <a href="{{ route('student.tips') }}" class="inline-flex items-center px-3 py-1.5 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg transition">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Tips & Panduan
            </a>
        </div>
    </div>
    
==============================================================================================================================================================================================================================
                                                    Progress & Timeline Pengaduan Terbaru Section
==============================================================================================================================================================================================================================
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Progress & Timeline Pengaduan
            </h3>
        </div>
        <div class="p-4">
            @php
                $latestComplaint = $pengaduanTerbaru->first();
            @endphp
            
            @if($latestComplaint)
                <!-- Progress Bar -->
                <div class="mb-4">
                    <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 mb-1">
                        <span>Progress Penyelesaian</span>
                        <span>{{ $latestComplaint->getProgressPercentageAttribute() }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                        <div class="{{ $latestComplaint->getProgressColorAttribute() }} h-2.5 rounded-full transition-all duration-500"
                             style="width: {{ $latestComplaint->getProgressPercentageAttribute() }}%"></div>
                    </div>
                </div>
                
                <!-- Timeline Steps -->
                <div class="relative mb-6">
                    <div class="flex justify-between">
                        <!-- Step 1: Menunggu -->
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold
                                {{ $latestComplaint->status == 'pending' || $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                    ? 'bg-yellow-500 text-white' 
                                    : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                1
                            </div>
                            <span class="text-xs mt-1 text-center">Menunggu</span>
                            <span class="text-[10px] text-gray-400">Pengaduan diterima</span>
                        </div>
                        
                        <!-- Line -->
                        <div class="flex-1 h-0.5 mt-3.5 mx-1 
                            {{ $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                ? 'bg-blue-500' 
                                : 'bg-gray-200 dark:bg-gray-700' }}">
                        </div>
                        
                        <!-- Step 2: Diproses -->
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold
                                {{ $latestComplaint->status == 'diproses' || $latestComplaint->status == 'selesai' 
                                    ? 'bg-blue-500 text-white' 
                                    : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                2
                            </div>
                            <span class="text-xs mt-1 text-center">Diproses</span>
                            <span class="text-[10px] text-gray-400">Sedang ditangani</span>
                        </div>
                        
                        <!-- Line -->
                        <div class="flex-1 h-0.5 mt-3.5 mx-1 
                            {{ $latestComplaint->status == 'selesai' 
                                ? 'bg-green-500' 
                                : 'bg-gray-200 dark:bg-gray-700' }}">
                        </div>
                        
                        <!-- Step 3: Selesai -->
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold
                                {{ $latestComplaint->status == 'selesai' 
                                    ? 'bg-green-500 text-white' 
                                    : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                                3
                            </div>
                            <span class="text-xs mt-1 text-center">Selesai</span>
                            <span class="text-[10px] text-gray-400">Pengaduan selesai</span>
                        </div>
                    </div>
                </div>
                
                <!-- Info Pengaduan Terkini -->
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Pengaduan Terkini: <span class="font-semibold">{{ $latestComplaint->judul }}</span>
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
                        <p class="text-xs text-green-600 dark:text-green-400 mt-2">
                            💬 {{ $latestComplaint->feedbacks->last()->pesan }}
                        </p>
                    @endif
                </div>
            @else
                <div class="text-center py-6 text-gray-500 dark:text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p>Belum ada pengaduan. Buat pengaduan pertama Anda!</p>
                    <a href="{{ route('complaint.index') }}" class="inline-block mt-3 px-3 py-1.5 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 transition">
                        Buat Pengaduan
                    </a>
                </div>
            @endif
        </div>
    </div>
    
    {{-- Daftar Pengaduan Terbaru Section --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                History Pengaduan
            </h3>
        </div>
        <div class="divide-y divide-gray-200 dark:divide-gray-700 max-h-80 overflow-y-auto">
            @forelse($pengaduanTerbaru as $pengaduan)
                <div class="p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center flex-wrap gap-1.5 mb-1">
                                <h4 class="font-medium text-sm text-gray-800 dark:text-white">{{ $pengaduan->judul }}</h4>
                                <span class="px-1.5 py-0.5 rounded-full text-[10px] font-semibold
                                    @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                                    @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                    @endif
                                ">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1.5">
                                {{ Str::limit($pengaduan->deskripsi, 70) }}
                            </p>
                            <div class="flex items-center flex-wrap gap-2 text-[10px] text-gray-400">
                                <span>📅 {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }}</span>
                                <span>📂 {{ $pengaduan->category->nama_kategori }}</span>
                                @if($pengaduan->location)
                                    <span>📍 {{ $pengaduan->location }}</span>
                                @endif
                                @if($pengaduan->feedbacks->count() > 0)
                                    <span class="text-green-500">💬 Ada balasan</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('complaint.history') }}" class="text-blue-600 dark:text-blue-400 text-[11px] hover:underline ml-2 flex-shrink-0">Detail</a>
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
@endsection