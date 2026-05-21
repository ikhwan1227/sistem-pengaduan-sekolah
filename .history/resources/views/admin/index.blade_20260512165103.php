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
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                        <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Filter
                    </button>
                    @if(request()->anyFilled(['tanggal', 'category_id', 'status']))
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
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition" id="row-{{ $c->id }}">
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-800 dark:text-white">{{ $c->user->name ?? '-' }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-gray-800 dark:text-white">{{ $c->judul }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ Str::limit($c->deskripsi, 50) }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                    {{ $c->category->nama_kategori ?? '-' }}
                                </span>
                            </td>
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
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <button onclick="showDetailModal({{ $c->id }})" 
                                        class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-xs font-medium transition flex items-center gap-1 mx-auto">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
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

{{-- ================= MODAL DETAIL PENGADUAN ================= --}}
<div id="detailModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden overflow-y-auto">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl w-full max-w-3xl my-8">
        {{-- Header lebih compact --}}
        <div class="flex justify-between items-center px-5 py-3 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">Detail Pengaduan</h2>
            </div>
            <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        {{-- Body dengan tinggi maksimal dan scroll --}}
        <div class="p-5 max-h-[70vh] overflow-y-auto" id="modalContent">
            {{-- Konten akan diisi oleh JavaScript --}}
            <div class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-6 w-6 border-b-2 border-blue-500"></div>
                <p class="mt-2 text-sm text-gray-500">Memuat data...</p>
            </div>
        </div>
    </div>
</div>

{{-- ================= MODAL KONFIRMASI HAPUS ================= --}}
<div id="deleteModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl w-full max-w-md">
        <div class="flex items-center gap-2 px-5 py-3 border-b border-gray-200 dark:border-gray-700">
            <div class="w-8 h-8 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-800 dark:text-white">Konfirmasi Hapus</h2>
        </div>
        <div class="p-5">
            <p class="text-gray-600 dark:text-gray-300">Apakah Anda yakin ingin menghapus pengaduan <strong id="deleteJudul"></strong>?</p>
            <p class="text-xs text-red-500 mt-1">⚠️ Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <form id="deleteForm" method="POST" class="px-5 pb-5 flex justify-end gap-2">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" class="px-3 py-1.5 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg text-sm transition">Batal</button>
            <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm transition">Hapus</button>
        </form>
    </div>
</div>

{{-- CSS Animasi --}}
<style>
    @keyframes shrink {
        from { width: 100%; }
        to { width: 0%; }
    }
    
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
    
    /* Sembunyikan scrollbar tapi tetap bisa scroll */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

{{-- JavaScript --}}
<script>
    // Variabel global untuk menyimpan data complaints (cache)
    let complaintsData = @json($complaints->keyBy('id'));

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
    
    // Show Detail Modal
    function showDetailModal(complaintId) {
        const modal = document.getElementById('detailModal');
        const contentDiv = document.getElementById('modalContent');
        
        modal.classList.remove('hidden');
        
        // Load data dari cache atau fetch
        const complaint = complaintsData[complaintId];
        
        if (complaint) {
            renderModalContent(complaint);
        } else {
            // Fallback: fetch dari server
            fetch(`/admin/complaint/${complaintId}/json`)
                .then(response => response.json())
                .then(data => {
                    complaintsData[complaintId] = data;
                    renderModalContent(data);
                })
                .catch(error => {
                    contentDiv.innerHTML = '<div class="text-center py-8 text-red-500">Gagal memuat data pengaduan</div>';
                });
        }
    }
    
    function renderModalContent(complaint) {
    const contentDiv = document.getElementById('modalContent');
    
    // Status badge mapping
    const statusConfig = {
        'pending': { text: 'Menunggu', color: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400', icon: '⏳' },
        'diproses': { text: 'Diproses', color: 'bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-400', icon: '🔄' },
        'selesai': { text: 'Selesai', color: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400', icon: '✅' },
        'ditolak': { text: 'Ditolak', color: 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400', icon: '❌' }
    };
    const status = statusConfig[complaint.status] || statusConfig['pending'];
    
    // Daftar feedback (compact)
    let feedbacksHtml = '';
    if (complaint.feedbacks && complaint.feedbacks.length > 0) {
        feedbacksHtml = `
            <div class="mt-3">
                <div class="flex items-center gap-1 mb-2">
                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">Riwayat Feedback</span>
                </div>
                <div class="space-y-1.5 max-h-28 overflow-y-auto">
        `;
        complaint.feedbacks.forEach(fb => {
            feedbacksHtml += `
                <div class="bg-gray-50 dark:bg-gray-700/30 rounded-md p-2">
                    <p class="text-xs text-gray-700 dark:text-gray-300">${escapeHtml(fb.pesan)}</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">${new Date(fb.tanggal).toLocaleString('id-ID')}</p>
                </div>
            `;
        });
        feedbacksHtml += `</div></div>`;
    } else {
        feedbacksHtml = `
            <div class="mt-3 text-center text-gray-400 text-xs py-2">
                <svg class="w-8 h-8 mx-auto mb-1 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Belum ada feedback
            </div>
        `;
    }
    
    contentDiv.innerHTML = `
        <div class="space-y-4">
            {{-- Grid 2 kolom kompak --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                {{-- Kolom Kiri --}}
                <div class="space-y-2">
                    <div class="flex items-start gap-2">
                        <span class="w-20 text-[11px] font-medium text-gray-500 dark:text-gray-400 flex-shrink-0">Judul</span>
                        <span class="text-sm font-semibold text-gray-800 dark:text-white">${escapeHtml(complaint.judul)}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="w-20 text-[11px] font-medium text-gray-500 dark:text-gray-400 flex-shrink-0">Pelapor</span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(complaint.user?.name || '-')}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="w-20 text-[11px] font-medium text-gray-500 dark:text-gray-400 flex-shrink-0">Kategori</span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(complaint.category?.nama_kategori || '-')}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="w-20 text-[11px] font-medium text-gray-500 dark:text-gray-400 flex-shrink-0">Lokasi</span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(complaint.location || '-')}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="w-20 text-[11px] font-medium text-gray-500 dark:text-gray-400 flex-shrink-0">Tanggal</span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">${new Date(complaint.tanggal).toLocaleDateString('id-ID')}</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="w-20 text-[11px] font-medium text-gray-500 dark:text-gray-400 flex-shrink-0">Status</span>
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full ${status.color}">${status.icon} ${status.text}</span>
                    </div>
                </div>
                
                {{-- Kolom Kanan --}}
                <div class="space-y-2">
                    <div>
                        <span class="text-[11px] font-medium text-gray-500 dark:text-gray-400">Deskripsi</span>
                        <p class="text-xs text-gray-700 dark:text-gray-300 mt-1 p-2 bg-gray-50 dark:bg-gray-700/30 rounded-md line-clamp-3">${escapeHtml(complaint.deskripsi)}</p>
                    </div>
                    ${complaint.image ? `
                    <div>
                        <span class="text-[11px] font-medium text-gray-500 dark:text-gray-400">Bukti Gambar</span>
                        <div class="mt-1">
                            <img src="/storage/${complaint.image}" class="max-h-32 rounded-md shadow-sm border border-gray-200 dark:border-gray-600 object-contain">
                        </div>
                    </div>
                    ` : ''}
                </div>
            </div>
            
            ${feedbacksHtml}
            
            {{-- Form Update Status (compact) --}}
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3">
                <div class="flex items-center gap-1 mb-2">
                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">Update Status</span>
                </div>
                <form method="POST" action="/admin/status/${complaint.id}" class="flex flex-wrap gap-2 items-end">
                    @csrf
                    <select name="status" class="flex-1 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md p-1.5 text-xs focus:ring-1 focus:ring-blue-500">
                        <option value="pending" ${complaint.status == 'pending' ? 'selected' : ''}>⏳ Menunggu</option>
                        <option value="diproses" ${complaint.status == 'diproses' ? 'selected' : ''}>🔄 Diproses</option>
                        <option value="selesai" ${complaint.status == 'selesai' ? 'selected' : ''}>✅ Selesai</option>
                        <option value="ditolak" ${complaint.status == 'ditolak' ? 'selected' : ''}>❌ Ditolak</option>
                    </select>
                    <button type="submit" class="px-3 py-1.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-md text-xs font-medium transition">Update</button>
                </form>
            </div>
            
            {{-- Form Feedback Baru (compact) --}}
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3">
                <div class="flex items-center gap-1 mb-2">
                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">Kirim Feedback</span>
                </div>
                <form method="POST" action="/admin/feedback/${complaint.id}" class="space-y-2">
                    @csrf
                    <textarea name="pesan" rows="2" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md p-2 text-xs focus:ring-1 focus:ring-blue-500" placeholder="Tulis feedback untuk siswa..." required></textarea>
                    <button type="submit" class="px-3 py-1.5 bg-purple-500 hover:bg-purple-600 text-white rounded-md text-xs font-medium transition">Kirim Feedback</button>
                </form>
            </div>
            
            {{-- Tombol Hapus (compact) --}}
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3">
                <button onclick="showDeleteModal('${complaint.id}', '${escapeHtml(complaint.judul).replace(/'/g, "\\'")}')" 
                        class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs font-medium transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Pengaduan
                </button>
            </div>
        </div>
    `;
}
        const contentDiv = document.getElementById('modalContent');
        
        // Status badge mapping
        const statusConfig = {
            'pending': { text: 'Menunggu', color: 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400', icon: '⏳' },
            'diproses': { text: 'Diproses', color: 'bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-400', icon: '🔄' },
            'selesai': { text: 'Selesai', color: 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400', icon: '✅' },
            'ditolak': { text: 'Ditolak', color: 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400', icon: '❌' }
        };
        const status = statusConfig[complaint.status] || statusConfig['pending'];
        
        // Daftar feedback
        let feedbacksHtml = '';
        if (complaint.feedbacks && complaint.feedbacks.length > 0) {
            feedbacksHtml = '<div class="mt-4"><h4 class="font-semibold text-gray-700 dark:text-gray-300 mb-3">📋 Riwayat Feedback</h4><div class="space-y-2 max-h-40 overflow-y-auto">';
            complaint.feedbacks.forEach(fb => {
                feedbacksHtml += `
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-3">
                        <p class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(fb.pesan)}</p>
                        <p class="text-xs text-gray-400 mt-1">${new Date(fb.tanggal).toLocaleString('id-ID')}</p>
                    </div>
                `;
            });
            feedbacksHtml += '</div></div>';
        } else {
            feedbacksHtml = '<div class="mt-4 text-center text-gray-400 text-sm">Belum ada feedback</div>';
        }
        
        contentDiv.innerHTML = `
            <div class="space-y-4">
                {{-- Grid 2 kolom untuk informasi utama --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <div class="flex items-start gap-2">
                            <span class="w-24 text-xs font-medium text-gray-500 dark:text-gray-400">Judul</span>
                            <span class="text-sm font-semibold text-gray-800 dark:text-white flex-1">${escapeHtml(complaint.judul)}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="w-24 text-xs font-medium text-gray-500 dark:text-gray-400">Pelapor</span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(complaint.user?.name || '-')}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="w-24 text-xs font-medium text-gray-500 dark:text-gray-400">Kategori</span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(complaint.category?.nama_kategori || '-')}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="w-24 text-xs font-medium text-gray-500 dark:text-gray-400">Lokasi</span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">${escapeHtml(complaint.location || '-')}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="w-24 text-xs font-medium text-gray-500 dark:text-gray-400">Tanggal Lapor</span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">${new Date(complaint.tanggal).toLocaleDateString('id-ID')}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="w-24 text-xs font-medium text-gray-500 dark:text-gray-400">Status</span>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full ${status.color}">${status.icon} ${status.text}</span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Deskripsi</span>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mt-1 p-3 bg-gray-50 dark:bg-gray-700/30 rounded-lg">${escapeHtml(complaint.deskripsi)}</p>
                        </div>
                        ${complaint.image ? `
                        <div>
                            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Bukti Gambar</span>
                            <div class="mt-1">
                                <img src="/storage/${complaint.image}" class="max-w-full max-h-48 rounded-lg shadow-sm border border-gray-200 dark:border-gray-600 object-contain">
                            </div>
                        </div>
                        ` : ''}
                    </div>
                </div>
                
                ${feedbacksHtml}
                
                {{-- Form Update Status --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-4">
                    <h4 class="font-semibold text-gray-700 dark:text-gray-300 mb-3">⚙️ Update Status</h4>
                    <form method="POST" action="/admin/status/${complaint.id}" class="flex flex-wrap gap-3 items-end">
                        @csrf
                        <div class="flex-1">
                            <select name="status" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg p-2 text-sm focus:ring-2 focus:ring-blue-500">
                                <option value="pending" ${complaint.status == 'pending' ? 'selected' : ''}>⏳ Pending (Menunggu)</option>
                                <option value="diproses" ${complaint.status == 'diproses' ? 'selected' : ''}>🔄 Diproses</option>
                                <option value="selesai" ${complaint.status == 'selesai' ? 'selected' : ''}>✅ Selesai</option>
                                <option value="ditolak" ${complaint.status == 'ditolak' ? 'selected' : ''}>❌ Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-medium transition">Update Status</button>
                    </form>
                </div>
                
                {{-- Form Feedback Baru --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <h4 class="font-semibold text-gray-700 dark:text-gray-300 mb-3">💬 Kirim Feedback</h4>
                    <form method="POST" action="/admin/feedback/${complaint.id}" class="space-y-3">
                        @csrf
                        <textarea name="pesan" rows="3" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg p-2 focus:ring-2 focus:ring-blue-500" placeholder="Tulis feedback untuk siswa..." required></textarea>
                        <button type="submit" class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg text-sm font-medium transition">Kirim Feedback</button>
                    </form>
                </div>
                
                {{-- Tombol Hapus --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <button onclick="showDeleteModal('${complaint.id}', '${escapeHtml(complaint.judul).replace(/'/g, "\\'")}')" 
                            class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Pengaduan
                    </button>
                </div>
            </div>
        `;
    }
    
    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }
    
    function showDeleteModal(complaintId, judul) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const judulElem = document.getElementById('deleteJudul');
        
        form.action = '/admin/delete/' + complaintId;
        judulElem.innerText = judul;
        modal.classList.remove('hidden');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    
    // Escape HTML untuk mencegah XSS
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Auto close success alert
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => closeAlert('success-alert'), 3000);
        }
        
        // Tutup modal jika klik di luar area modal
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) closeDetailModal();
        });
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    });
</script>
@endsection