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

    {{-- ================= LAYOUT 2 KOLOM (Tips | Quick Action + Progress + History) ================= --}}
    <div class="flex flex-col lg:flex-row gap-5">
        
        {{-- ================= KOLOM KIRI: TIPS CARD (DIPERBESAR) ================= --}}
        <div class="flex-1 lg:w-2/3">
            <div class="bg-gradient-to-br from-purple-50 via-indigo-50 to-blue-50 dark:from-purple-900/30 dark:via-indigo-900/30 dark:to-blue-900/30 rounded-xl shadow-sm border border-purple-200 dark:border-purple-800 overflow-hidden h-full">
                <div class="px-5 py-3 border-b border-purple-200 dark:border-purple-800 bg-white/50 dark:bg-gray-800/30">
                    <h3 class="font-semibold text-gray-800 dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        💡 Tips & Panduan Pengaduan
                    </h3>
                </div>
                
                <div class="p-5" x-data="tipsSlider()" x-init="initSlider()">
                    <!-- Slider Container -->
                    <div class="relative overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + currentIndex * 100 + '%)'">
                            <template x-for="(tip, index) in tips" :key="index">
                                <div class="w-full flex-shrink-0 px-2">
                                    <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-md border border-purple-100 dark:border-purple-800">
                                        <div class="flex items-start gap-4">
                                            <div class="text-4xl" x-text="tip.icon"></div>
                                            <div class="flex-1">
                                                <h4 class="text-lg font-bold text-gray-800 dark:text-white" x-text="tip.title"></h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 leading-relaxed" x-text="tip.content"></p>
                                                <div class="mt-3 flex items-center gap-2">
                                                    <span class="text-xs text-purple-500 dark:text-purple-400">💡 Tips #<span x-text="index + 1"></span></span>
                                                    <span class="text-xs text-gray-400">•</span>
                                                    <span class="text-xs text-gray-400">Bermanfaat untuk pengaduan Anda</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    
                    <!-- Navigation Dots -->
                    <div class="flex justify-center gap-2 mt-5">
                        <template x-for="(tip, index) in tips" :key="index">
                            <button @click="currentIndex = index" 
                                    class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                                    :class="currentIndex === index ? 'w-6 bg-purple-500' : 'bg-purple-300 dark:bg-purple-600'">
                            </button>
                        </template>
                    </div>
                    
                    <!-- Tombol Prev/Next -->
                    <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 -ml-2 w-8 h-8 bg-white dark:bg-gray-800 rounded-full shadow-md flex items-center justify-center hover:bg-purple-50 dark:hover:bg-purple-900/30 transition border border-purple-200 dark:border-purple-700">
                        <svg class="w-4 h-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 -mr-2 w-8 h-8 bg-white dark:bg-gray-800 rounded-full shadow-md flex items-center justify-center hover:bg-purple-50 dark:hover:bg-purple-900/30 transition border border-purple-200 dark:border-purple-700">
                        <svg class="w-4 h-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- ================= KOLOM KANAN: QUICK ACTION + PROGRESS + HISTORY ================= --}}
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
            
            {{-- HISTORY CARD (Ringkasan) --}}
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
                
                <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-[280px] overflow-y-auto">
                    @forelse($pengaduanTerbaru->take(3) as $pengaduan)
                        <div class="p-2.5 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap mb-0.5">
                                        <h4 class="font-medium text-xs text-gray-800 dark:text-white truncate">
                                            {{ $pengaduan->judul }}
                                        </h4>
                                        <span class="text-[9px] px-1 py-0.5 rounded-full font-medium
                                            @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700
                                            @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            {{ substr($pengaduan->status, 0, 1) }}
                                        </span>
                                    </div>
                                    <p class="text-[10px] text-gray-500 dark:text-gray-400 truncate">
                                        {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }} • {{ $pengaduan->category->nama_kategori }}
                                    </p>
                                    @if($pengaduan->feedbacks->count() > 0)
                                        <p class="text-[9px] text-green-500 mt-0.5 truncate">💬 Ada balasan</p>
                                    @endif
                                </div>
                                <a href="{{ route('complaint.history') }}" class="text-blue-500 text-[9px] ml-2 shrink-0">Detail</a>
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
    </div>
</div>

<script>
    function tipsSlider() {
        return {
            tips: [
                { icon: '📝', title: 'Deskripsi yang Detail', content: 'Jelaskan masalah secara detail agar admin bisa memahami dan menindaklanjuti dengan cepat. Sertakan waktu kejadian, lokasi, dan kronologi.' },
                { icon: '📸', title: 'Sertakan Foto', content: 'Lampirkan foto bukti untuk memperkuat pengaduan Anda. Foto yang jelas akan membantu tim teknis lebih cepat memahami masalah.' },
                { icon: '🏷️', title: 'Pilih Kategori Tepat', content: 'Pilih kategori yang sesuai agar pengaduan cepat diproses oleh bagian terkait. Kategori yang salah bisa memperlambat proses.' },
                { icon: '👀', title: 'Follow Up', content: 'Pantau status pengaduan Anda secara berkala. Jika sudah 3 hari belum ada tanggapan, Anda bisa menanyakan melalui fitur komentar.' },
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
                this.intervalId = setInterval(() => {
                    this.next();
                }, 5000);
            },
            resetAutoSlide() {
                clearInterval(this.intervalId);
                this.startAutoSlide();
            }
        }
    }
</script>
@endsection