@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- ================= GREETING ================= --}}
    <div>
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            Halo, {{ auth()->user()->name }} 👋
        </h2>
        <p class="text-sm text-gray-500">
            Pantau pengaduan dan aktivitas terbaru kamu di sini
        </p>
    </div>


    {{-- ================= STATS MODERN ================= --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-4 shadow">
            <p class="text-xs opacity-80">Total</p>
            <p class="text-2xl font-bold">{{ $totalPengaduan }}</p>
        </div>

        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white rounded-xl p-4 shadow">
            <p class="text-xs opacity-80">Bulan Ini</p>
            <p class="text-2xl font-bold">{{ $totalBulanIni }}</p>
        </div>

        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl p-4 shadow">
            <p class="text-xs opacity-80">Diproses</p>
            <p class="text-2xl font-bold">{{ $diproses }}</p>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-4 shadow">
            <p class="text-xs opacity-80">Selesai</p>
            <p class="text-2xl font-bold">{{ $selesai }}</p>
        </div>

        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl p-4 shadow">
            <p class="text-xs opacity-80">Ditolak</p>
            <p class="text-2xl font-bold">{{ $ditolak }}</p>
        </div>

    </div>


    {{-- ================= LAYOUT ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        {{-- ================= LEFT ================= --}}
        <div class="lg:col-span-8 space-y-6">

            {{-- HISTORY --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow border overflow-hidden">
                <div class="px-4 py-3 border-b">
                    <h3 class="font-semibold text-gray-800 dark:text-white">
                        History Pengaduan
                    </h3>
                </div>

                <div class="divide-y">
                    @forelse($pengaduanTerbaru as $pengaduan)
                        <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">

                            <div class="flex justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-medium text-sm dark:text-white">
                                            {{ $pengaduan->judul }}
                                        </h4>

                                        <span class="text-xs px-2 py-0.5 rounded-full
                                            @if($pengaduan->status=='pending') bg-yellow-100 text-yellow-700
                                            @elseif($pengaduan->status=='diproses') bg-blue-100 text-blue-700
                                            @elseif($pengaduan->status=='selesai') bg-green-100 text-green-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </div>

                                    <p class="text-xs text-gray-500">
                                        {{ Str::limit($pengaduan->deskripsi, 80) }}
                                    </p>
                                </div>

                                <a href="{{ route('complaint.history') }}"
                                   class="text-blue-500 text-xs hover:underline">
                                    Detail
                                </a>
                            </div>

                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            Belum ada pengaduan
                        </div>
                    @endforelse
                </div>
            </div>

        </div>


        {{-- ================= RIGHT ================= --}}
        <div class="lg:col-span-4 space-y-6">

            {{-- QUICK ACTION --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow border p-4">
                <h3 class="font-semibold mb-3 dark:text-white">Quick Action</h3>

                <div class="flex gap-2">
                    <a href="{{ route('complaint.index') }}"
                       class="flex-1 text-center bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg text-sm">
                        + Buat
                    </a>

                    <a href="{{ route('complaint.history') }}"
                       class="flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white py-2 rounded-lg text-sm">
                        Histori
                    </a>
                </div>
            </div>


            {{-- PROGRESS MODERN --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow border p-4">
                <h3 class="font-semibold mb-3 dark:text-white">Progress</h3>

                @php
                    $latestComplaint = $pengaduanTerbaru->first();
                @endphp

                @if($latestComplaint)

                    <div class="mb-2 flex justify-between text-xs">
                        <span>Progress</span>
                        <span>{{ $latestComplaint->getProgressPercentageAttribute() }}%</span>
                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                        <div class="bg-blue-500 h-2 rounded-full"
                             style="width: {{ $latestComplaint->getProgressPercentageAttribute() }}%">
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                        <p class="text-sm font-medium dark:text-white">
                            {{ $latestComplaint->judul }}
                        </p>

                        <p class="text-xs text-gray-500 mt-1">
                            Status: {{ ucfirst($latestComplaint->status) }}
                        </p>
                    </div>

                @endif
            </div>


            {{-- ACTIVITY FEED (NEW 🔥) --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow border p-4">
                <h3 class="font-semibold mb-3 dark:text-white">Aktivitas Terbaru</h3>

                <div class="space-y-3 text-sm">

                    @forelse($pengaduanTerbaru->take(3) as $item)
                        <div class="flex items-start gap-2">
                            <span class="text-blue-500">●</span>
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $item->judul }} sedang {{ $item->status }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">
                            Belum ada aktivitas
                        </p>
                    @endforelse

                </div>
            </div>

        </div>

    </div>

</div>
@endsection