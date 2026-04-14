@extends('layouts.student')

@section('title', 'Histori Pengaduan')

@section('content')
<div class="space-y-5">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center">
            <svg class="w-6 h-6 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Histori Pengaduan
        </h2>
        <a href="{{ route('complaint.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Buat Pengaduan Baru
        </a>
    </div>
    
    <!-- Daftar Pengaduan -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h3 class="font-semibold text-sm text-gray-800 dark:text-white flex items-center">
                <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Semua Pengaduan
            </h3>
        </div>
        
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($complaints as $pengaduan)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition" id="complaint-{{ $pengaduan->id }}">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center flex-wrap gap-2 mb-2">
                                <h4 class="font-semibold text-gray-800 dark:text-white">{{ $pengaduan->judul }}</h4>
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
                            
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                {{ $pengaduan->deskripsi }}
                            </p>
                            
                            <div class="flex items-center flex-wrap gap-3 text-xs text-gray-400 mb-3">
                                <span>📅 {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }}</span>
                                <span>📂 {{ $pengaduan->category->nama_kategori }}</span>
                                @if($pengaduan->image)
                                    <span>🖼️ Ada gambar</span>
                                @endif
                            </div>
                            
                            @if($pengaduan->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $pengaduan->image) }}" class="max-w-xs rounded-lg shadow-sm">
                                </div>
                            @endif
                            
                            @if($pengaduan->feedbacks->count() > 0)
                                <div class="mt-3 bg-green-50 dark:bg-green-900/20 rounded-lg p-3 border-l-4 border-green-500">
                                    <p class="font-semibold text-sm text-green-700 dark:text-green-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        Balasan Admin:
                                    </p>
                                    @foreach($pengaduan->feedbacks as $feedback)
                                        <p class="text-green-700 dark:text-green-300 text-sm mt-1">• {{ $feedback->pesan }}</p>
                                        <p class="text-xs text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($feedback->tanggal)->format('d/m/Y H:i') }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-lg font-medium">Belum ada pengaduan</p>
                    <p class="text-sm mt-1">Silakan buat pengaduan pertama Anda</p>
                    <a href="{{ route('complaint.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Buat Pengaduan
                    </a>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($complaints->hasPages())
            <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700">
                {{ $complaints->links() }}
            </div>
        @endif
    </div>
</div>
@endsection