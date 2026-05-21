@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    
    {{-- ================= HERO SECTION ================= --}}
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 dark:from-blue-800 dark:to-indigo-900 rounded-2xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold">Dashboard Admin</h1>
                        <p class="text-blue-100 text-sm mt-1">Kelola dan pantau semua pengaduan siswa</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="bg-white/20 dark:bg-white/10 rounded-lg px-3 py-1.5 backdrop-blur-sm">
                    <span class="text-sm">{{ now()->format('l, d F Y') }}</span>
                </div>
                <div class="bg-white/20 dark:bg-white/10 rounded-lg px-3 py-1.5 backdrop-blur-sm">
                    <span class="text-sm">Total: {{ $totalAll ?? 0 }} Pengaduan</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= STATS CARD ================= --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <!-- Total -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 dark:border-gray-700 group">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalAll ?? 0 }}</span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Total Pengaduan</p>
            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">Semua waktu</p>
        </div>

        <!-- Bulan Ini -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 dark:border-gray-700 group">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalBulanIni ?? 0 }}</span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Bulan Ini</p>
            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">{{ now()->format('F Y') }}</p>
        </div>

        <!-- Pending -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 dark:border-gray-700 group">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ $totalPending ?? 0 }}</span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Pending</p>
            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">Menunggu diproses</p>
        </div>

        <!-- Diproses -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 dark:border-gray-700 group">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-sky-100 dark:bg-sky-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-sky-600 dark:text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-sky-600 dark:text-sky-400">{{ $totalDiproses ?? 0 }}</span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Diproses</p>
            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">Sedang ditangani</p>
        </div>

        <!-- Selesai -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 dark:border-gray-700 group">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $totalSelesai ?? 0 }}</span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Selesai</p>
            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">Telah selesai</p>
        </div>

        <!-- Ditolak -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200 dark:border-gray-700 group">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-rose-100 dark:bg-rose-900/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                    <svg class="w-5 h-5 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-2xl font-bold text-rose-600 dark:text-rose-400">{{ $totalDitolak ?? 0 }}</span>
            </div>
            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Ditolak</p>
            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-1">Tidak diproses</p>
        </div>
    </div>

    {{-- ================= ALERT SUCCESS (Auto Dismiss) ================= --}}
    @if(session('success'))
        <div id="success-alert" class="mb-6 bg-emerald-50 dark:bg-emerald-900/30 border-l-4 border-emerald-500 text-emerald-700 dark:text-emerald-400 p-4 rounded-lg shadow-sm relative transition-all duration-500">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="closeAlert('success-alert')" class="text-emerald-700 dark:text-emerald-400 hover:text-emerald-900">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="absolute bottom-0 left-0 h-0.5 bg-emerald-500 rounded-b-lg" style="width: 100%; animation: shrink 3s linear forwards;"></div>
        </div>
    @endif

    {{-- ================= FILTER SECTION ================= --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-6 overflow-hidden">
        <div class="border-b border-gray-200 dark:border-gray-700 px-5 py-3 bg-gray-50 dark:bg-gray-700/30">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <h3 class="font-semibold text-gray-700 dark:text-gray-300">Filter Pengaduan</h3>
            </div>
        </div>
        <div class="p-5">
            <form method="GET" class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[150px]">
                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex-1 min-w-[150px]">
                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Kategori</label>
                    <select name="category_id" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Kategori</option>
                        @foreach($categories ?? [] as $c)
                            <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1 min-w-[150px]">
                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>  {{-- ✅ Ditambahkan --}}
                    </select>
                </div>
                <div class="flex gap-2">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                        <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Filter
                    </button>
                    @if(request()->anyFilled(['tanggal', 'category_id', 'user_id', 'status']))  {{-- ✅ Perbaiki kondisi reset --}}
                        <a href="{{ route('admin.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                            <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- ================= LIST PENGADUAN (TABLE LAYOUT) ================= --}}
@if(isset($complaints) && $complaints->count() > 0)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pelapor</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Judul</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($complaints as $index => $c)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                        {{-- Nomor --}}
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $index + 1 }}
                        </td>
                        
                        {{-- Pelapor --}}
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-800 dark:text-white">{{ $c->user->name ?? '-' }}</div>
                        </td>
                        
                        {{-- Judul + Deskripsi singkat --}}
                        <td class="px-4 py-3">
                            <div class="text-sm font-medium text-gray-800 dark:text-white">{{ $c->judul }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ Str::limit($c->deskripsi, 50) }}</div>
                            @if($c->image)
                                <span class="inline-flex items-center gap-1 text-[10px] text-blue-500 mt-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    Ada gambar
                                </span>
                            @endif
                        </td>
                        
                        {{-- Kategori --}}
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                {{ $c->category->nama_kategori ?? '-' }}
                            </span>
                        </td>
                        
                        {{-- Status --}}
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                @if($c->status == 'pending') bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400
                                @elseif($c->status == 'diproses') bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-400
                                @elseif($c->status == 'selesai') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400
                                @else bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400
                                @endif
                            ">
                                @if($c->status == 'pending') ⏳ Menunggu
                                @elseif($c->status == 'diproses') 🔄 Diproses
                                @elseif($c->status == 'selesai') ✅ Selesai
                                @else ❌ Ditolak
                                @endif
                            </span>
                        </td>
                        
                        {{-- Tanggal --}}
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}
                        </td>
                        
                        {{-- Aksi (tombol update status, feedback, hapus) --}}
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                {{-- Form Update Status --}}
                                <form method="POST" action="/admin/status/{{ $c->id }}" class="inline">
                                    @csrf
                                    <select name="status" class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg p-1 text-[11px] focus:ring-1 focus:ring-blue-500">
                                        <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                        <option value="diproses" {{ $c->status == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                                        <option value="selesai" {{ $c->status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                                        <option value="ditolak" {{ $c->status == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                                    </select>
                                    <button type="submit" class="ml-1 px-2 py-1 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-[11px] transition">
                                        Update
                                    </button>
                                </form>
                                
                                {{-- Tombol Feedback --}}
                                <button onclick="showFeedbackModal({{ $c->id }}, '{{ addslashes($c->judul) }}')" 
                                        class="px-2 py-1 bg-purple-500 hover:bg-purple-600 text-white rounded-lg text-[11px] transition"
                                        title="Beri Feedback">
                                    💬
                                </button>
                                
                                {{-- Tombol Hapus --}}
                                <form method="POST" action="/admin/delete/{{ $c->id }}" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-rose-500 hover:bg-rose-600 text-white rounded-lg text-[11px] transition" title="Hapus">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination (jika ada) --}}
        @if(method_exists($complaints, 'links'))
            <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700">
                {{ $complaints->links() }}
            </div>
        @endif
    </div>
@else
    <div class="bg-amber-50 dark:bg-amber-900/20 rounded-xl p-8 text-center border border-amber-200 dark:border-amber-800">
        <svg class="w-16 h-16 mx-auto text-amber-400 dark:text-amber-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <p class="text-amber-700 dark:text-amber-400 font-medium">Belum ada pengaduan</p>
        <p class="text-sm text-amber-600 dark:text-amber-500 mt-1">Belum ada pengaduan yang masuk dari siswa</p>
    </div>
@endif

</div>

{{-- Modal Feedback --}}
<div id="feedbackModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Kirim Feedback</h2>
            <button onclick="closeFeedbackModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form id="feedbackForm" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pengaduan</label>
                <p id="feedbackComplaintTitle" class="text-sm text-gray-600 dark:text-gray-400 mb-3 font-medium"></p>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pesan Feedback</label>
                <textarea name="pesan" rows="3" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Tulis feedback untuk siswa..." required></textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeFeedbackModal()" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg">Kirim Feedback</button>
            </div>
        </form>
    </div>
</div>

{{-- CSS Animasi --}}
<style>
    @keyframes shrink {
        from { width: 100%; }
        to { width: 0%; }
    }
    
    /* Line clamp untuk membatasi teks */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

{{-- JavaScript untuk Auto Dismiss Alert & Modal --}}
<script>
    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }
    }
    
    function showFeedbackModal(complaintId, complaintTitle) {
        const modal = document.getElementById('feedbackModal');
        const form = document.getElementById('feedbackForm');
        const titleElem = document.getElementById('feedbackComplaintTitle');
        
        form.action = '/admin/feedback/' + complaintId;
        titleElem.innerText = complaintTitle;
        modal.classList.remove('hidden');
    }
    
    function closeFeedbackModal() {
        document.getElementById('feedbackModal').classList.add('hidden');
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => closeAlert('success-alert'), 3000);
        }
    });
</script>
@endsection