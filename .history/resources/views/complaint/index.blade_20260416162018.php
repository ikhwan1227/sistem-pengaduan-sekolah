@extends('layouts.student')

@section('title', 'Pengaduan Saya')

@section('content')
<div class="space-y-6 px-4 md:px-6 lg:px-8" x-data="{ activeTab: window.location.hash ? window.location.hash.substring(1) : 'buat' }" x-init="$watch('activeTab', value => window.location.hash = value)">
    
    {{-- ================= HEADER HALAMAN + TAB MENU ================= --}}
<div class="border-b-2 border-gray-300 dark:border-gray-600 pb-4 mb-6">
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
        
        {{-- Tab Menu di samping kanan --}}
        <nav class="flex space-x-1 md:space-x-2 bg-gray-100 dark:bg-gray-800/50 rounded-lg p-1">
            {{-- Tab Buat Pengaduan --}}
            <button @click="activeTab = 'buat'" 
                    :class="activeTab === 'buat' ? 'bg-white dark:bg-gray-700 text-blue-600 dark:text-blue-400 shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'"
                    class="px-3 md:px-4 py-1.5 rounded-md text-sm font-medium transition-all duration-200 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat
            </button>
            
            {{-- Tab Histori --}}
            <button @click="activeTab = 'histori'" 
                    :class="activeTab === 'histori' ? 'bg-white dark:bg-gray-700 text-blue-600 dark:text-blue-400 shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'"
                    class="px-3 md:px-4 py-1.5 rounded-md text-sm font-medium transition-all duration-200 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Histori
                @if($complaints->total() > 0)
                    <span class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 text-xs px-1.5 py-0.5 rounded-full">{{ $complaints->total() }}</span>
                @endif
            </button>
            
            {{-- Tab Draft --}}
            <button @click="activeTab = 'draft'" 
                    :class="activeTab === 'draft' ? 'bg-white dark:bg-gray-700 text-blue-600 dark:text-blue-400 shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'"
                    class="px-3 md:px-4 py-1.5 rounded-md text-sm font-medium transition-all duration-200 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                Draft
                @if(isset($drafts) && $drafts->count() > 0)
                    <span class="bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-xs px-1.5 py-0.5 rounded-full">{{ $drafts->count() }}</span>
                @endif
            </button>
        </nav>
    </div>
</div>
    
    {{-- ================= KONTEN TAB BUAT PENGADUAN ================= --}}
<div x-show="activeTab === 'buat'" x-cloak>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            {{-- Header dengan ilustrasi --}}
            <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 dark:from-blue-800 dark:to-indigo-900 px-6 py-8 md:px-8">
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-white">
                                @if(isset($draft))
                                    Edit Draft Pengaduan
                                @else
                                    Buat Pengaduan Baru
                                @endif
                            </h2>
                            <p class="text-sm text-blue-100 mt-1">Laporkan masalah fasilitas sekolah Anda dengan mudah</p>
                        </div>
                    </div>
                </div>
                {{-- Dekorasi background --}}
                <div class="absolute right-0 top-0 opacity-10">
                    <svg class="w-32 h-32 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            
            {{-- Form Body --}}
            <div class="p-6 md:p-8">
                <form method="POST" action="{{ isset($draft) ? route('complaint.store') : route('complaint.store') }}" enctype="multipart/form-data" id="complaintForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Kolom Kiri --}}
                        <div class="space-y-5">
                            {{-- Judul --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                    Judul Pengaduan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="judul" placeholder="Contoh: AC Ruang Kelas Rusak" 
                                    class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('judul') border-red-500 @enderror" 
                                    value="{{ isset($draft) ? $draft->judul : old('judul') }}" required>
                                @error('judul')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            {{-- Kategori --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="category_id" class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('category_id') border-red-500 @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}" {{ (isset($draft) && $draft->category_id == $c->id) || old('category_id') == $c->id ? 'selected' : '' }}>
                                            {{ $c->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            {{-- Lokasi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                    Lokasi Pengaduan
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="location" placeholder="Gedung A Lantai 2, Ruang 201" 
                                        class="w-full pl-9 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('location') border-red-500 @enderror" 
                                        value="{{ isset($draft) ? $draft->location : old('location') }}">
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Opsional, untuk memudahkan penanganan</p>
                                @error('location')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Kolom Kanan --}}
                        <div class="space-y-5">
                            {{-- Deskripsi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                    Deskripsi <span class="text-red-500">*</span>
                                </label>
                                <textarea name="deskripsi" placeholder="Jelaskan pengaduan secara detail..." rows="5"
                                    class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('deskripsi') border-red-500 @enderror" required>{{ isset($draft) ? $draft->deskripsi : old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            {{-- Upload Gambar --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                                    Foto Pendukung
                                </label>
                                <div x-data="fileUpload()" x-init="init()" class="w-full">
                                    <label for="image-upload" 
                                           class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded-xl cursor-pointer transition-all duration-200"
                                           :class="isDragging ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/20' : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-800'"
                                           @dragover.prevent="isDragging = true"
                                           @dragleave.prevent="isDragging = false"
                                           @drop.prevent="handleDrop($event)">
                                        
                                        <div class="flex flex-col items-center justify-center py-6" x-show="!filePreview && !fileName">
                                            <svg class="w-10 h-10 mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                                            </p>
                                            <p class="text-xs text-gray-400">
                                                JPG, PNG, GIF (MAX. 2MB)
                                            </p>
                                        </div>
                                        
                                        <div x-show="filePreview" class="relative w-full flex flex-col items-center justify-center py-4">
                                            <img :src="filePreview" class="max-h-28 rounded-lg shadow-sm object-contain">
                                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2" x-text="fileName"></p>
                                            <button type="button" @click="removeFile()" class="mt-2 text-xs text-red-500 hover:text-red-600 flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Hapus file
                                            </button>
                                        </div>
                                        
                                        <div x-show="fileName && !filePreview" class="flex flex-col items-center justify-center py-6">
                                            <svg class="w-10 h-10 mb-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="text-sm text-gray-700 dark:text-gray-300" x-text="fileName"></p>
                                            <button type="button" @click="removeFile()" class="mt-2 text-xs text-red-500 hover:text-red-600">Hapus file</button>
                                        </div>
                                        
                                        <input type="file" name="image" id="image-upload" accept="image/*" class="hidden" @change="handleFileSelect($event)">
                                    </label>
                                </div>
                                @if(isset($draft) && $draft->image)
                                    <p class="text-xs text-green-500 mt-2">📷 Draft memiliki gambar</p>
                                @endif
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    {{-- Tombol Aksi --}}
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit" name="action" value="draft" formaction="{{ route('complaint.draft') }}" 
                                class="px-6 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl transition-all duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Simpan ke Draft
                        </button>
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        {{-- Informasi tambahan --}}
        <div class="mt-4 text-center text-xs text-gray-400 dark:text-gray-500">
            <p>Dengan mengirimkan pengaduan, Anda menyetujui ketentuan yang berlaku.</p>
        </div>
    </div>
</div>
    
    {{-- ================= KONTEN TAB DRAFT ================= --}}
    <div x-show="activeTab === 'draft'" x-cloak>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 card-header-gradient">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Draft Pengaduan
                    </h2>
                    <span class="text-xs text-white/80">{{ isset($drafts) ? $drafts->count() : 0 }} draft tersimpan</span>
                </div>
            </div>
            
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @if(isset($drafts) && $drafts->count() > 0)
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
                @else
                    <div class="text-center py-12">
                        <svg class="w-20 h-20 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">Belum ada draft pengaduan</p>
                       <button onclick="window.switchTab('buat')" 
                                class="inline-block mt-4 px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all duration-200">
                            + Buat Pengaduan Sekarang
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    {{-- ================= KONTEN TAB HISTORI ================= --}}
    <div x-show="activeTab === 'histori'" x-cloak>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-[0_8px_25px_rgba(37,99,235,0.15)] hover:shadow-[0_12px_35px_rgba(37,99,235,0.25)] transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 card-header-gradient">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Histori Pengaduan
                    </h2>
                    <span class="text-xs text-white/80">{{ $complaints->total() }} pengaduan</span>
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
                        <p class="text-gray-500 dark:text-gray-400">Belum ada pengaduan</p>
                        <button onclick="window.dispatchEvent(new CustomEvent('switch-tab', {detail: 'buat'}))" 
                                class="inline-block mt-4 px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all duration-200">
                            + Buat Pengaduan Sekarang
                        </button>
                    </div>
                @endforelse
            </div>
            
            @if($complaints->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $complaints->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Fungsi sederhana untuk switch tab dari tombol di empty state
    window.switchTab = function(tab) {
        var root = document.querySelector('[x-data]');
        if (root && root.__x) {
            root.__x.$data.activeTab = tab;
        }
    };

    // File upload dengan drag & drop
    function fileUpload() {
        return {
            filePreview: null,
            fileName: null,
            isDragging: false,
            init() {
                // Cek apakah ada file yang sudah diupload sebelumnya (untuk edit draft)
                @if(isset($draft) && $draft->image)
                    this.fileName = '{{ basename($draft->image) }}';
                    this.filePreview = '{{ asset('storage/' . $draft->image) }}';
                @endif
            },
            handleFileSelect(event) {
                const file = event.target.files[0];
                this.processFile(file);
            },
            handleDrop(event) {
                const file = event.dataTransfer.files[0];
                this.processFile(file);
            },
            processFile(file) {
                if (!file) return;
                
                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Hanya file gambar yang diperbolehkan (JPG, PNG, GIF)');
                    return;
                }
                
                // Validasi ukuran file (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    return;
                }
                
                this.fileName = file.name;
                
                // Buat preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.filePreview = e.target.result;
                };
                reader.readAsDataURL(file);
                
                // Update input file
                const input = document.getElementById('image-upload');
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                input.files = dataTransfer.files;
                
                this.isDragging = false;
            },
            removeFile() {
                this.filePreview = null;
                this.fileName = null;
                const input = document.getElementById('image-upload');
                input.value = '';
                this.isDragging = false;
            }
        }
    }
</script>

<style>
    /* Alpine.js hide until ready */
    [x-cloak] { display: none !important; }
    
    /* Card header gradient */
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
    
    /* Line clamp */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Pagination styling */
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
@endsection