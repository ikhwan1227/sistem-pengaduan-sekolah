@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">
    {{-- Stats Cards Section --}}
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

    {{-- Grid Layout untuk 3 Section Utama (Quick Action, Progress, History) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- KIRI (LEBAR): HISTORY PENGADUAN --}}
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden h-full">
            
            <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    History Pengaduan
                </h3>
            </div>

            <div class="divide-y divide-gray-200 dark:divide-gray-700 max-h-[600px] overflow-y-auto">
                @forelse($pengaduanTerbaru as $pengaduan)
                    <div class="p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center flex-wrap gap-1.5 mb-1">
                                    <h4 class="font-medium text-sm text-gray-800 dark:text-white">{{ $pengaduan->judul }}</h4>
                                    <span class="px-1.5 py-0.5 rounded-full text-[10px] font-semibold
                                        @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800
                                        @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif
                                    ">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </div>

                                <p class="text-xs text-gray-500 mb-1.5">
                                    {{ Str::limit($pengaduan->deskripsi, 70) }}
                                </p>

                                <div class="flex flex-wrap gap-2 text-[10px] text-gray-400">
                                    <span>📅 {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }}</span>
                                    <span>📂 {{ $pengaduan->category->nama_kategori }}</span>
                                    @if($pengaduan->location)
                                        <span>📍 {{ $pengaduan->location }}</span>
                                    @endif
                                </div>
                            </div>

                            <a href="{{ route('complaint.history') }}" class="text-blue-600 text-[11px] hover:underline ml-2">
                                Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-gray-500">
                        <p>Belum ada pengaduan</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    {{-- KANAN: QUICK ACTION + PROGRESS --}}
    <div class="lg:col-span-1 space-y-5">

        {{-- QUICK ACTION --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-4 py-2 border-b bg-gray-50">
                <h3 class="font-semibold text-sm">Quick Action</h3>
            </div>

            <div class="p-3 flex flex-wrap gap-2">
                <a href="{{ route('complaint.index') }}" class="px-3 py-1.5 bg-blue-500 text-white text-sm rounded-lg">
                    + Buat
                </a>
                <a href="{{ route('complaint.history') }}" class="px-3 py-1.5 bg-gray-500 text-white text-sm rounded-lg">
                    Histori
                </a>
                <a href="{{ route('student.tips') }}" class="px-3 py-1.5 bg-purple-500 text-white text-sm rounded-lg">
                    Tips
                </a>
            </div>
        </div>

        {{-- PROGRESS & TIMELINE --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-4 py-2 border-b bg-gray-50">
                <h3 class="font-semibold text-sm">Progress & Timeline</h3>
            </div>

            <div class="p-4">
                @php
                    $latestComplaint = $pengaduanTerbaru->first();
                @endphp

                @if($latestComplaint)

                    {{-- Progress Bar --}}
                    <div class="mb-4">
                        <div class="flex justify-between text-xs mb-1">
                            <span>Progress</span>
                            <span>{{ $latestComplaint->getProgressPercentageAttribute() }}%</span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-500 h-2.5 rounded-full"
                                style="width: {{ $latestComplaint->getProgressPercentageAttribute() }}%">
                            </div>
                        </div>
                    </div>

                    {{-- Timeline --}}
                    <div class="flex justify-between text-xs text-center">
                        <div class="flex-1">Menunggu</div>
                        <div class="flex-1">Diproses</div>
                        <div class="flex-1">Selesai</div>
                    </div>

                @else
                    <p class="text-sm text-gray-500 text-center">
                        Belum ada pengaduan
                    </p>
                @endif
            </div>
        </div>

    </div>

</div>
</div>
@endsection