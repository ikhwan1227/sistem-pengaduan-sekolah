@extends('layouts.student')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="space-y-6">
    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-800">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                @if(isset($draft))
                    Edit Draft Pengaduan
                @else
                    Buat Pengaduan Baru
                @endif
            </h2>
        </div>
        
        <div class="p-6">
            <form method="POST" action="{{ isset($draft) ? route('complaint.store') : route('complaint.store') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Judul -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Judul Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" placeholder="Contoh: AC Ruang Kelas Rusak" 
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('judul') border-red-500 @enderror" 
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
                    <select name="category_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('category_id') border-red-500 @enderror" required>
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
                
                <!-- Lokasi Pengaduan (BARU) -->
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
                            class="w-full pl-9 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('location') border-red-500 @enderror" 
                            value="{{ isset($draft) ? $draft->location : old('location') }}">
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Opsional, tetapi disarankan untuk memudahkan penanganan</p>
                    @error('location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Deskripsi -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" placeholder="Jelaskan pengaduan secara detail..." rows="5"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('deskripsi') border-red-500 @enderror" required>{{ isset($draft) ? $draft->deskripsi : old('deskripsi') }}</textarea>
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
                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
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
                
                <!-- Tombol Aksi -->
                <div class="flex justify-end space-x-3">
                    <button type="submit" name="action" value="draft" formaction="{{ route('complaint.draft') }}" 
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg shadow-sm transition-all duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Simpan ke Draft
                    </button>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200">
                        <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Daftar Draft Pengaduan (BARU) -->
    @if(isset($drafts) && $drafts->count() > 0)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 bg-yellow-50 dark:bg-yellow-900/20">
            <h2 class="text-md font-semibold text-yellow-700 dark:text-yellow-400 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                Draft Pengaduan (Belum Dikirim)
            </h2>
        </div>
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($drafts as $draftItem)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center flex-wrap gap-2 mb-1">
                                <h4 class="font-medium text-gray-800 dark:text-white">{{ $draftItem->judul }}</h4>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-yellow-100 text-yellow-700">
                                    Draft
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                {{ Str::limit($draftItem->deskripsi, 100) }}
                            </p>
                            <div class="flex items-center gap-3 text-xs text-gray-400">
                                <span>📅 {{ \Carbon\Carbon::parse($draftItem->tanggal)->format('d/m/Y H:i') }}</span>
                                @if($draftItem->location)
                                    <span>📍 {{ $draftItem->location }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex space-x-2 ml-4">
                            <a href="{{ route('complaint.edit.draft', $draftItem->id) }}" 
                               class="px-3 py-1 bg-blue-500 text-white text-xs rounded-lg hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('complaint.delete.draft', $draftItem->id) }}" 
                                  onsubmit="return confirm('Yakin ingin menghapus draft ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600 transition">
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
    
    <!-- Histori Pengaduan -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Histori Pengaduan Saya
            </h2>
        </div>
        
        <div class="p-6">
            @forelse($complaints as $c)
                <div class="mb-4 last:mb-0 bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex flex-wrap justify-between items-start gap-2 mb-3">
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
                    
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        📂 {{ $c->category->nama_kategori }} | 📅 {{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}
                        @if($c->location)
                            | 📍 {{ $c->location }}
                        @endif
                    </p>
                    
                    <p class="text-gray-700 dark:text-gray-300 mb-3">{{ $c->deskripsi }}</p>
                    
                    @if($c->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $c->image) }}" class="max-w-xs rounded-lg shadow-sm">
                        </div>
                    @endif
                    
                    @if($c->feedbacks->count() > 0)
                        <div class="mt-3 bg-green-50 dark:bg-green-900/20 rounded-lg p-3 border-l-4 border-green-500">
                            <p class="font-semibold text-sm text-green-700 dark:text-green-400 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <div class="text-center py-8">
                    <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400">Belum ada pengaduan. Buat pengaduan pertama Anda!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection