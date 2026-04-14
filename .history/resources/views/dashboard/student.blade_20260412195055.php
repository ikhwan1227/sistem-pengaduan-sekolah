@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">
    
    {{-- ================= STATS CARD (BERDERET KE SAMPING) ================= --}}
    <div class="flex flex-wrap md:flex-nowrap gap-3">
        <!-- Total -->
        <div class="flex-1 min-w-[100px] bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-blue-100">Total Pengaduan</p>
                    <p class="text-2xl font-bold text-white">{{ $totalPengaduan }}</p>
                </div>
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-blue-200">Semua waktu</div>
        </div>
        
        <!-- Bulan Ini -->
        <div class="flex-1 min-w-[100px] bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-green-100">Bulan Ini</p>
                    <p class="text-2xl font-bold text-white">{{ $totalBulanIni }}</p>
                </div>
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-green-200">{{ now()->format('F Y') }}</div>
        </div>
        
        <!-- Diproses -->
        <div class="flex-1 min-w-[100px] bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-yellow-100">Diproses</p>
                    <p class="text-2xl font-bold text-white">{{ $diproses }}</p>
                </div>
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-yellow-200">Sedang ditangani</div>
        </div>
        
        <!-- Selesai -->
        <div class="flex-1 min-w-[100px] bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-emerald-100">Selesai</p>
                    <p class="text-2xl font-bold text-white">{{ $selesai }}</p>
                </div>
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-emerald-200">Telah selesai</div>
        </div>
        
        <!-- Ditolak -->
        <div class="flex-1 min-w-[100px] bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-rose-100">Ditolak</p>
                    <p class="text-2xl font-bold text-white">{{ $ditolak }}</p>
                </div>
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-1 text-[9px] text-rose-200">Tidak diproses</div>
        </div>
    </div>

    {{-- ================= LAYOUT 2 KOLOM SEIMBANG ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        
        {{-- ================= KOLOM KIRI: TIPS CARD (STYLE PREMIUM) ================= --}}
        <div>
            <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 rounded-2xl shadow-2xl overflow-hidden">
                <!-- Header dengan efek glassmorphism -->
                <div class="px-5 py-4 border-b border-white/20 bg-white/10 backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-lg">Tips & Panduan</h3>
                            <p class="text-[11px] text-white/70">Cara membuat pengaduan yang efektif</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-5" x-data="tipsSlider()" x-init="initSlider()">
                    <div class="relative overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + currentIndex * 100 + '%)'">
                            <template x-for="(tip, index) in tips" :key="index">
                                <div class="w-full flex-shrink-0 px-1">
                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 border border-white/20 shadow-lg">
                                        <div class="flex items-start gap-4">
                                            <div class="text-4xl drop-shadow-lg" x-text="tip.icon"></div>
                                            <div class="flex-1">
                                                <h4 class="text-base font-bold text-white" x-text="tip.title"></h4>
                                                <p class="text-sm text-white/80 mt-2 leading-relaxed" x-text="tip.content"></p>
                                                <div class="mt-3 flex items-center gap-2">
                                                    <span class="text-[10px] px-2 py-1 rounded-full bg-white/20 text-white">💡 Tips #<span x-text="index + 1"></span></span>
                                                    <span class="text-[10px] text-white/50">•</span>
                                                    <span class="text-[10px] text-white/50">Bermanfaat untuk Anda</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    
                    <!-- Dots Navigation Premium -->
                    <div class="flex justify-center gap-2 mt-5">
                        <template x-for="(tip, index) in tips" :key="index">
                            <button @click="currentIndex = index" 
                                    class="h-1.5 rounded-full transition-all duration-300"
                                    :class="currentIndex === index ? 'w-6 bg-white' : 'w-1.5 bg-white/40'">
                            </button>
                        </template>
                    </div>
                    
                    <!-- Tombol Prev/Next dengan efek glass -->
                    <button @click="prev()" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center hover:bg-white/30 transition-all duration-300 shadow-lg">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="next()" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center hover:bg-white/30 transition-all duration-300 shadow-lg">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                
                <!-- Footer dengan promo style -->
                <div class="px-5 py-3 border-t border-white/20 bg-white/5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                            <span class="text-[10px] text-white/60">Tips berganti otomatis setiap 5 detik</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="text-[10px] text-white/40">⏱️</span>
                            <span class="text-[10px] text-white/40">Tips #<span x-text="currentIndex + 1"></span>/<span x-text="tips.length"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- ================= KOLOM KANAN: QUICK ACTION + PROGRESS + HISTORY ================= --}}
        <div class="flex flex-col gap-4">
            
            {{-- QUICK ACTION --}}
            <div class="bg-gradient-to-r from-slate-50 to-gray-50 dark:from-gray-800 dark:to-gray-800/80 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Action
                    </h3>
                </div>
                <div class="p-3">
                    <div class="flex gap-2">
                        <a href="{{ route('complaint.index') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Buat
                        </a>
                        <a href="{{ route('complaint.history') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Histori
                        </a>
                        <a href="{{ route('student.tips') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tips
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- PROGRESS & TIMELINE --}}
            <div class="bg-gradient-to-r from-slate-50 to-gray-50 dark:from-gray-800 dark:to-gray-800/80 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <div class="mb-3">
                            <div class="flex justify-between text-[10px] text-gray-600 dark:text-gray-400 mb-1">
                                <span>Progress</span>
                                <span class="font-semibold text-indigo-600">{{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2 rounded-full transition-all duration-500" style="width: {{ $latestComplaint->getProgressPercentageAttribute() ?? 0 }}%"></div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between text-[9px] text-gray-500 dark:text-gray-400 mb-3">
                            <span>Menunggu</span>
                            <span>Diproses</span>
                            <span>Selesai</span>
                        </div>
                        
                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-lg p-3 border border-indigo-100 dark:border-indigo-800">
                            <div class="flex items-start gap-2">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-medium text-gray-800 dark:text-white">{{ $latestComplaint->judul }}</p>
                                    <p class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5">
                                        Status: 
                                        <span class="font-semibold text-indigo-600 dark:text-indigo-400">
                                            {{ ucfirst($latestComplaint->status) }}
                                        </span>
                                    </p>
                                    @if($latestComplaint->feedbacks->count() > 0)
                                        <p class="text-[9px] text-emerald-600 dark:text-emerald-400 mt-1">💬 {{ Str::limit($latestComplaint->feedbacks->last()->pesan, 60) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-xs text-gray-500">Belum ada pengaduan</p>
                            <a href="{{ route('complaint.index') }}" class="inline-block mt-1 text-[10px] text-indigo-500 hover:underline">Buat pengaduan</a>
                        </div>
                    @endif
                </div>
            </div>
            
            {{-- HISTORY CARD --}}
            <div class="bg-gradient-to-r from-slate-50 to-gray-50 dark:from-gray-800 dark:to-gray-800/80 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700">
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
                
                <div class="divide-y divide-gray-100 dark:divide-gray-700 max-h-[250px] overflow-y-auto">
                    @forelse($pengaduanTerbaru->take(3) as $pengaduan)
                        <div class="p-2.5 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition duration-200">
                            <div class="flex justify-between items-start">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-1.5 flex-wrap mb-0.5">
                                        <h4 class="font-medium text-xs text-gray-800 dark:text-white truncate">{{ $pengaduan->judul }}</h4>
                                        <span class="text-[9px] px-1.5 py-0.5 rounded-full font-medium
                                            @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700
                                            @elseif($pengaduan->status == 'selesai') bg-green-100 text-green-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            {{ substr($pengaduan->status, 0, 1) }}
                                        </span>
                                    </div>
                                    <p class="text-[10px] text-gray-500 dark:text-gray-400 truncate">{{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }} • {{ $pengaduan->category->nama_kategori }}</p>
                                    @if($pengaduan->feedbacks->count() > 0)
                                        <p class="text-[9px] text-emerald-500 mt-0.5 truncate">💬 Ada balasan</p>
                                    @endif
                                </div>
                                <a href="{{ route('complaint.history') }}" class="text-indigo-500 text-[9px] ml-2 shrink-0 hover:underline">Detail</a>
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