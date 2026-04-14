@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">

    {{-- ================= STATS (FIX: SEJAJAR) ================= --}}
    <div class="flex flex-wrap lg:flex-nowrap gap-3">

        <div class="flex-1 min-w-[120px] bg-white dark:bg-gray-800 rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500 dark:text-gray-400">Total</p>
            <p class="text-xl font-bold dark:text-white">{{ $totalPengaduan }}</p>
        </div>

        <div class="flex-1 min-w-[120px] bg-white dark:bg-gray-800 rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500 dark:text-gray-400">Bulan Ini</p>
            <p class="text-xl font-bold dark:text-white">{{ $totalBulanIni }}</p>
        </div>

        <div class="flex-1 min-w-[120px] bg-white dark:bg-gray-800 rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500 dark:text-gray-400">Diproses</p>
            <p class="text-xl font-bold text-yellow-600">{{ $diproses }}</p>
        </div>

        <div class="flex-1 min-w-[120px] bg-white dark:bg-gray-800 rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500 dark:text-gray-400">Selesai</p>
            <p class="text-xl font-bold text-green-600">{{ $selesai }}</p>
        </div>

        <div class="flex-1 min-w-[120px] bg-white dark:bg-gray-800 rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500 dark:text-gray-400">Ditolak</p>
            <p class="text-xl font-bold text-red-600">{{ $ditolak }}</p>
        </div>

    </div>


    {{-- ================= LAYOUT ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-5">

        {{-- ================= HISTORY ================= --}}
        <div class="lg:col-span-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow border overflow-hidden">

                <div class="px-4 py-2 border-b bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-semibold text-sm dark:text-white">History Pengaduan</h3>
                </div>

                <div class="divide-y max-h-[600px] overflow-y-auto">
                    @forelse($pengaduanTerbaru as $pengaduan)
                        <div class="p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <div class="flex justify-between">

                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="text-sm font-medium dark:text-white">
                                            {{ $pengaduan->judul }}
                                        </h4>

                                        <span class="text-xs px-2 py-0.5 rounded-full
                                            @if($pengaduan->status=='pending') bg-yellow-100 text-yellow-800
                                            @elseif($pengaduan->status=='diproses') bg-blue-100 text-blue-800
                                            @elseif($pengaduan->status=='selesai') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ Str::limit($pengaduan->deskripsi, 80) }}
                                    </p>
                                </div>

                                <a href="{{ route('complaint.history') }}"
                                   class="text-blue-500 text-xs">
                                    Detail
                                </a>

                            </div>
                        </div>
                    @empty
                        <div class="p-5 text-center text-gray-500">
                            Belum ada pengaduan
                        </div>
                    @endforelse
                </div>

            </div>
        </div>


        {{-- ================= KANAN ================= --}}
        <div class="lg:col-span-4 flex flex-col gap-5">

            {{-- QUICK ACTION --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow border">
                <div class="px-4 py-2 border-b bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-semibold text-sm dark:text-white">Quick Action</h3>
                </div>

                <div class="p-3 flex gap-2 flex-wrap">
                    <a href="{{ route('complaint.index') }}"
                       class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg">
                        + Buat
                    </a>

                    <a href="{{ route('complaint.history') }}"
                       class="px-3 py-1.5 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-lg">
                        Histori
                    </a>

                    <a href="{{ route('student.tips') }}"
                       class="px-3 py-1.5 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg">
                        Tips
                    </a>
                </div>
            </div>


            {{-- PROGRESS & TIMELINE (FIX: INFO KEMBALI) --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow border">
                <div class="px-4 py-2 border-b bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-semibold text-sm dark:text-white">Progress & Timeline</h3>
                </div>

                <div class="p-4">
                    @php
                        $latestComplaint = $pengaduanTerbaru->first();
                    @endphp

                    @if($latestComplaint)

                        {{-- PROGRESS BAR --}}
                        <div class="mb-4">
                            <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 mb-1">
                                <span>Progress</span>
                                <span>{{ $latestComplaint->getProgressPercentageAttribute() }}%</span>
                            </div>

                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="{{ $latestComplaint->getProgressColorAttribute() }} h-2.5 rounded-full"
                                     style="width: {{ $latestComplaint->getProgressPercentageAttribute() }}%">
                                </div>
                            </div>
                        </div>

                        {{-- TIMELINE --}}
                        <div class="flex justify-between text-xs mb-4">
                            <span>Menunggu</span>
                            <span>Diproses</span>
                            <span>Selesai</span>
                        </div>

                        {{-- INFO PENGADUAN (FIX) --}}
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                            <p class="text-sm font-medium dark:text-white">
                                {{ $latestComplaint->judul }}
                            </p>

                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                Status:
                                <span class="font-semibold">
                                    {{ ucfirst($latestComplaint->status) }}
                                </span>
                            </p>

                            @if($latestComplaint->feedbacks->count() > 0)
                                <p class="text-xs text-green-600 mt-2">
                                    💬 {{ $latestComplaint->feedbacks->last()->pesan }}
                                </p>
                            @endif
                        </div>

                    @else
                        <p class="text-sm text-gray-500 text-center">
                            Belum ada pengaduan
                        </p>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>
@endsection