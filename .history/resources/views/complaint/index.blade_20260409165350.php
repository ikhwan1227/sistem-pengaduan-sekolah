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
                Buat Pengaduan Baru
            </h2>
        </div>
        
        <div class="p-6">
            <form method="POST" action="{{ route('complaint.store') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Judul -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Judul Pengaduan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" placeholder="Contoh: AC Ruang Kelas Rusak" 
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('judul') border-red-500 @enderror" 
                        value="{{ old('judul') }}" required>
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
                            <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Deskripsi -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" placeholder="Jelaskan pengaduan secara detail..." rows="5"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('deskripsi') border-red-500 @enderror" required>{{ old('deskripsi') }}</textarea>
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
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span>Kirim Pengaduan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
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