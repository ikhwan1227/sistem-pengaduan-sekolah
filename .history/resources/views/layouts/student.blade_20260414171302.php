@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard Siswa</h1>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
            <p class="text-sm text-gray-500">Total</p>
            <p class="text-2xl font-bold">{{ $totalPengaduan ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
            <p class="text-sm text-gray-500">Bulan Ini</p>
            <p class="text-2xl font-bold">{{ $totalBulanIni ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
            <p class="text-sm text-gray-500">Diproses</p>
            <p class="text-2xl font-bold">{{ $diproses ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
            <p class="text-sm text-gray-500">Selesai</p>
            <p class="text-2xl font-bold">{{ $selesai ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
            <p class="text-sm text-gray-500">Ditolak</p>
            <p class="text-2xl font-bold">{{ $ditolak ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
            <p class="text-sm text-gray-500">Draft</p>
            <p class="text-2xl font-bold">{{ $draft ?? 0 }}</p>
        </div>
    </div>
    
    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
        <h2 class="font-bold mb-2">Pengaduan Terbaru</h2>
        @forelse($pengaduanTerbaru ?? [] as $item)
            <p class="text-sm">{{ $item->judul }} - {{ $item->status }}</p>
        @empty
            <p class="text-sm text-gray-500">Belum ada pengaduan</p>
        @endforelse
    </div>
</div>
@endsection