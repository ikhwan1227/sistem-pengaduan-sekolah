@extends('layouts.student')

@section('title', 'Ringkasan & Tips')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4 flex items-center">
        <svg class="w-6 h-6 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Ringkasan Informasi & Tips Pengaduan
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @php
            $allTips = [
                ['title' => 'Deskripsi yang Detail', 'content' => 'Jelaskan masalah secara detail agar admin bisa memahami dan menindaklanjuti dengan cepat. Sertakan waktu kejadian, lokasi, dan kronologi.', 'icon' => '📝'],
                ['title' => 'Sertakan Foto', 'content' => 'Lampirkan foto bukti untuk memperkuat pengaduan Anda. Foto yang jelas akan membantu tim teknis lebih cepat memahami masalah.', 'icon' => '📸'],
                ['title' => 'Pilih Kategori Tepat', 'content' => 'Pilih kategori yang sesuai agar pengaduan cepat diproses oleh bagian terkait. Kategori yang salah bisa memperlambat proses.', 'icon' => '🏷️'],
                ['title' => 'Follow Up', 'content' => 'Pantau status pengaduan Anda secara berkala. Jika sudah 3 hari belum ada tanggapan, Anda bisa menanyakan melalui fitur komentar.', 'icon' => '👀'],
                ['title' => 'Bahasa Santun', 'content' => 'Sampaikan pengaduan dengan bahasa yang santun dan sopan. Komunikasi yang baik akan mempercepat penyelesaian masalah.', 'icon' => '💬'],
                ['title' => 'Satu Pengaduan Satu Masalah', 'content' => 'Pisahkan pengaduan yang berbeda agar lebih mudah diproses. Satu pengaduan untuk satu jenis masalah.', 'icon' => '🎯'],
                ['title' => 'Prioritas Pengaduan', 'content' => 'Masalah yang membahayakan keselamatan (listrik, kebakaran, dll) akan diprioritaskan. Segera laporkan masalah darurat ke pihak sekolah langsung.', 'icon' => '⚠️'],
                ['title' => 'Bukti Pendukung', 'content' => 'Selain foto, Anda juga bisa melampirkan video atau dokumen pendukung lainnya untuk memperkuat pengaduan.', 'icon' => '📎'],
            ];
        @endphp
        
        @foreach($allTips as $tip)
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                <div class="flex items-start space-x-3">
                    <div class="text-2xl">{{ $tip['icon'] }}</div>
                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white">{{ $tip['title'] }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $tip['content'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection