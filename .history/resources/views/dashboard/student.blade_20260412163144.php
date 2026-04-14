@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5">

    {{-- ================= STATS ================= --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">

        <div class="bg-white rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500">Total</p>
            <p class="text-xl font-bold">{{ $totalPengaduan }}</p>
        </div>

        <div class="bg-white rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500">Bulan Ini</p>
            <p class="text-xl font-bold">{{ $totalBulanIni }}</p>
        </div>

        <div class="bg-white rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500">Diproses</p>
            <p class="text-xl font-bold text-yellow-600">{{ $diproses }}</p>
        </div>

        <div class="bg-white rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500">Selesai</p>
            <p class="text-xl font-bold text-green-600">{{ $selesai }}</p>
        </div>

        <div class="bg-white rounded-lg p-3 shadow border">
            <p class="text-xs text-gray-500">Ditolak</p>
            <p class="text-xl font-bold text-red-600">{{ $ditolak }}</p>
        </div>

    </div>

    {{-- ================= LAYOUT UTAMA ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-5">

        {{-- ================= HISTORY (KIRI BESAR) ================= --}}
        <div class="lg:col-span-8">
            <div class="bg-white rounded-lg shadow border h-full">

                <div class="px-4 py-2 border-b bg-gray-50">
                    <h3 class="font-semibold text-sm">History Pengaduan</h3>
                </div>

                <div class="divide-y max-h-[600px] overflow-y-auto">
                    @forelse($pengaduanTerbaru as $pengaduan)
                        <div class="p-3 hover:bg-gray-50 transition">
                            <div class="flex justify-between">

                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-medium text-sm">
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

                                    <p class="text-xs text-gray-500 mb-1">
                                        {{ Str::limit($pengaduan->deskripsi, 80) }}
                                    </p>

                                    <div class="text-[10px] text-gray-400 flex gap-2">
                                        <span>📅 {{ \Carbon\Carbon::parse($pengaduan->tanggal)->format('d/m/Y') }}</span>
                                        <span>📂 {{ $pengaduan->category->nama_kategori }}</span>
                                    </div>
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
            <div class="bg-white rounded-lg shadow border">
                <div class="px-4 py-2 border-b bg-gray-50">
                    <h3 class="font-semibold text-sm">Quick Action</h3>
                </div>

                <div class="p-3 flex gap-2 flex-wrap">
                    <a href="{{ route('complaint.index') }}"
                       class="px-3 py-1.5 bg-blue-500 text-white text-sm rounded-lg">
                        + Buat
                    </a>

                    <a href="{{ route('complaint.history') }}"
                       class="px-3 py-1.5 bg-gray-500 text-white text-sm rounded-lg">
                        Histori
                    </a>

                    <a href="{{ route('student.tips') }}"
                       class="px-3 py-1.5 bg-purple-500 text-white text-sm rounded-lg">
                        Tips
                    </a>
                </div>
            </div>

            {{-- PROGRESS --}}
            <div class="bg-white rounded-lg shadow border">
                <div class="px-4 py-2 border-b bg-gray-50">
                    <h3 class="font-semibold text-sm">Progress & Timeline</h3>
                </div>

                <div class="p-4">
                    @php
                        $latestComplaint = $pengaduanTerbaru->first();
                    @endphp

                    @if($latestComplaint)

                        <div class="mb-2 flex justify-between text-xs">
                            <span>Progress</span>
                            <span>{{ $latestComplaint->getProgressPercentageAttribute() }}%</span>
                        </div>

                        <div class="w-full bg-gray-200 h-2 rounded-full">
                            <div class="bg-blue-500 h-2 rounded-full"
                                 style="width: {{ $latestComplaint->getProgressPercentageAttribute() }}%">
                            </div>
                        </div>

                    @else
                        <p class="text-sm text-gray-500 text-center">
                            Belum ada data
                        </p>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>
@endsection