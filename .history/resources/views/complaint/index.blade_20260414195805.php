@extends('layouts.student')

@section('title', 'Pengaduan Saya')

@section('content')
<div class="space-y-6 px-4 md:px-6 lg:px-8">
    
    {{-- ================= HEADER HALAMAN ================= --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                <svg class="w-7 h-7 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Pengaduan Saya
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kelola dan pantau semua pengaduan Anda</p>
        </div>
        <div class="flex gap-2">
            <button type="button" id="showFormBtn" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                + Buat Pengaduan Baru
            </button>
        </div>
    </div>
    
    {{-- ================= FORM BUAT PENGADUAN (Collapsible) ================= --}}
    <div id="formContainer" class="hidden transition-all duration-300">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
            {{-- Header Form --}}
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 card-header-gradient">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    @if(isset($draft))
                        Edit Draft Pengaduan
                    @else
                        Form Pengaduan Baru
                    @endif
                </h2>
            </div>
            
            <div class="p-6">
                <form method="POST" action="{{ isset($draft) ? route('complaint.store') : route('complaint.store') }}" enctype="multipart/form-data" id="complaintForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        {{-- Kolom Kiri --}}
                        <div>
                            <!-- Judul -->
                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Judul Pengaduan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="judul" placeholder="Contoh: AC Ruang Kelas Rusak" 
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('judul') border-red-500 @enderror" 
                                    value="{{ isset($draft) ? $draft->judul : old('judul') }}" required>
                                @error('judul')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Kategori -->
                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="category_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('category_id') border-red-500 @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}" {{ (isset($draft) && $draft->category_id == $c->id) || old('category_id') == $c->id ? 'selected' : '' }}>
                                            {{ $c->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Lokasi -->
                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Lokasi Pengaduan
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="location" placeholder="Contoh: Gedung A Lantai 2, Ruang 201" 
                                        class="w-full pl-9 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('location') border-red-500 @enderror" 
                                        value="{{ isset($draft) ? $draft->location : old('location') }}">
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Opsional, tetapi disarankan untuk memudahkan penanganan</p>
                                @error('location')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Kolom Kanan --}}
                        <div>
                            <!-- Deskripsi -->
                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Deskripsi <span class="text-red-500">*</span>
                                </label>
                                <textarea name="deskripsi" placeholder="Jelaskan pengaduan secara detail..." rows="5"
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('deskripsi') border-red-500 @enderror" required>{{ isset($draft) ? $draft->deskripsi : old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Upload Gambar -->
                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Foto Pendukung (Opsional)
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition-all duration-200">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                JPG, PNG, GIF (MAX. 2MB)
                                            </p>
                                        </div>
                                        <input type="file" name="image" accept="image/*" class="hidden" onchange="this.parentElement.parentElement.querySelector('.file-name').innerHTML = this.files[0]?.name || 'Belum ada file'">
                                    </label>
                                </div>
                                <p class="file-name text-xs text-gray-500 dark:text-gray-400 mt-2"></p>
                                @if(isset($draft) && $draft->image)
                                    <p class="text-xs text-green-500 mt-1">📷 Draft memiliki gambar</p>
                                @endif
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    {{-- Tombol Aksi --}}
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <button type="button" id="cancelFormBtn" class="px-5 py-2.5 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </button>
                        <button type="submit" name="action" value="draft" formaction="{{ route('complaint.draft') }}" 
                                class="px-5 py-2.5 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Simpan ke Draft
                        </button>
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- ================= DAFTAR DRAFT PENGGUNA ================= --}}
    @if(isset($drafts) && $drafts->count() > 0)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 card-header-gradient">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Draft Pengaduan
                </h2>
                <span class="text-xs text-white/80">{{ $drafts->count() }} draft tersimpan</span>
            </div>
        </div>
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($drafts as $draftItem)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-200">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3">
                        <div class="flex-1">
                            <div class="flex items-center flex-wrap gap-2 mb-2">
                                <h4 class="font-medium text-gray-800 dark:text-white">{{ $draftItem->judul }}</h4>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                                    Draft
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2 line-clamp-2">
                                {{ Str::limit($draftItem->deskripsi, 100) }}
                            </p>
                            <div class="flex flex-wrap items-center gap-3 text-xs text-gray-400">
                                <span class="flex items-center gap-1">📅 {{ \Carbon\Carbon::parse($draftItem->tanggal)->format('d/m/Y H:i') }}</span>
                                @if($draftItem->location)
                                    <span class="flex items-center gap-1">📍 {{ Str::limit($draftItem->location, 30) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex space-x-2 flex-shrink-0">
                            <a href="{{ route('complaint.edit.draft', $draftItem->id) }}" 
                               class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium rounded-lg transition-all duration-200 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('complaint.delete.draft', $draftItem->id) }}" 
                                  onsubmit="return confirm('Yakin ingin menghapus draft ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-all duration-200 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
    
    {{-- ================= HISTORI PENGGADUAN ================= --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 card-header-gradient">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Histori Pengaduan
                </h2>
                <span class="text-xs text-white/80">{{ $complaints->count() }} pengaduan</span>
            </div>
        </div>
        
        <div class="p-6">
            @forelse($complaints as $c)
                <div class="mb-4 last:mb-0 bg-gray-50 dark:bg-gray-700/30 rounded-xl p-5 hover:shadow-md transition-all duration-200 border border-gray-100 dark:border-gray-700">
                    <div class="flex flex-wrap justify-between items-start gap-2 mb-3">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="font-semibold text-gray-800 dark:text-white text-lg">{{ $c->judul }}</h3>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    @if($c->status == 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @elseif($c->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                                    @else bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                    @endif
                                ">
                                    {{ ucfirst($c->status) }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex flex-wrap gap-3">
                                <span class="flex items-center gap-1">📂 {{ $c->category->nama_kategori }}</span>
                                <span class="flex items-center gap-1">📅 {{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}</span>
                                @if($c->location)
                                    <span class="flex items-center gap-1">📍 {{ Str::limit($c->location, 40) }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <p class="text-gray-700 dark:text-gray-300 mb-3 leading-relaxed">{{ $c->deskripsi }}</p>
                    
                    @if($c->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $c->image) }}" class="max-w-xs rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                        </div>
                    @endif
                    
                    @if($c->feedbacks->count() > 0)
                        <div class="mt-3 bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border-l-4 border-green-500">
                            <p class="font-semibold text-sm text-green-700 dark:text-green-400 flex items-center gap-1 mb-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Balasan Admin:
                            </p>
                            @foreach($c->feedbacks as $f)
                                <p class="text-green-700 dark:text-green-300 text-sm mt-1">• {{ $f->pesan }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="w-20 h-20 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400">Belum ada pengaduan. Buat pengaduan pertama Anda!</p>
                    <button type="button" id="showFormBtnEmpty" class="inline-block mt-4 px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all duration-200">
                        + Buat Pengaduan Sekarang
                    </button>
                </div>
            @endforelse
        </div>
        
        {{-- Pagination --}}
        @if($complaints->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $complaints->links() }}
            </div>
        @endif
    </div>
</div>

<script>
    // Toggle Form Visibility
    const formContainer = document.getElementById('formContainer');
    const showFormBtn = document.getElementById('showFormBtn');
    const showFormBtnEmpty = document.getElementById('showFormBtnEmpty');
    const cancelFormBtn = document.getElementById('cancelFormBtn');
    
    function showForm() {
        formContainer.classList.remove('hidden');
        formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    
    function hideForm() {
        formContainer.classList.add('hidden');
    }
    
    if (showFormBtn) showFormBtn.addEventListener('click', showForm);
    if (showFormBtnEmpty) showFormBtnEmpty.addEventListener('click', showForm);
    if (cancelFormBtn) cancelFormBtn.addEventListener('click', hideForm);
    
    // Tampilkan form jika ada error dari server (validation error)
    @if($errors->any() || isset($draft))
        showForm();
    @endif
</script>

<style>
    /* Sembunyikan tombol pagination default Laravel yang tidak rapi */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .pagination .page-item {
        list-style: none;
    }
    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 0.75rem;
        border-radius: 0.5rem;
        background-color: #f3f4f6;
        color: #374151;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    .dark .pagination .page-link {
        background-color: #374151;
        color: #d1d5db;
    }
    .pagination .page-link:hover {
        background-color: #e5e7eb;
    }
    .dark .pagination .page-link:hover {
        background-color: #4b5563;
    }
    .pagination .active .page-link {
        background: linear-gradient(135deg, #3B82F6 0%, #6366F1 100%);
        color: white;
    }
    .pagination .disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>

<style>
    /* CSS Class untuk header card - warna gradient */
    .card-header-gradient {
        background: linear-gradient(135deg, #3B82F6 0%, #6366F1 100%) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
    }
    .card-header-gradient h2,
    .card-header-gradient .card-title {
        color: white !important;
    }
    .card-header-gradient svg {
        color: white !important;
    }
    .card-header-gradient a {
        color: rgba(255, 255, 255, 0.8) !important;
    }
    .card-header-gradient a:hover {
        color: white !important;
    }
    
    /* Animasi fade in untuk form */
    #formContainer {
        animation: fadeIn 0.3s ease-out;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Line clamp untuk teks */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection