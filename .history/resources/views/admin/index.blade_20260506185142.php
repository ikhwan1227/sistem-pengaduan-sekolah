<x-app-layout>
<div class="max-w-7xl mx-auto px-4 py-6">

    <div class="bg-blue-500 text-white p-4 rounded-lg mb-4">
        <h1 class="text-2xl font-bold">Dashboard Admin</h1>
        <p>TEST - Jika tampilan ini muncul, maka file berfungsi</p>
    </div>

    {{-- STATS CARD SEDERHANA --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 mb-6">
        <!-- Total -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow border">
            <p class="text-xs text-gray-500">Total</p>
            <p class="text-2xl font-bold">{{ $totalAll ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow border">
            <p class="text-xs text-gray-500">Bulan Ini</p>
            <p class="text-2xl font-bold">{{ $totalBulanIni ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow border">
            <p class="text-xs text-gray-500">Pending</p>
            <p class="text-2xl font-bold text-yellow-600">{{ $totalPending ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow border">
            <p class="text-xs text-gray-500">Diproses</p>
            <p class="text-2xl font-bold text-blue-600">{{ $totalDiproses ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow border">
            <p class="text-xs text-gray-500">Selesai</p>
            <p class="text-2xl font-bold text-green-600">{{ $totalSelesai ?? 0 }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow border">
            <p class="text-xs text-gray-500">Ditolak</p>
            <p class="text-2xl font-bold text-red-600">{{ $totalDitolak ?? 0 }}</p>
        </div>
    </div>

    {{-- DAFTAR PENGAduAN --}}
    @if(isset($complaints) && $complaints->count() > 0)
        @foreach($complaints as $c)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-3 border">
            <div class="flex justify-between">
                <h3 class="font-bold">{{ $c->judul }}</h3>
                <span class="text-xs px-2 py-1 rounded-full bg-yellow-100">{{ $c->status }}</span>
            </div>
            <p class="text-sm text-gray-600 mt-1">{{ $c->deskripsi }}</p>
            <p class="text-xs text-gray-400 mt-2">Siswa: {{ $c->user->name ?? '-' }} | {{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}</p>
        </div>
        @endforeach
    @else
        <div class="bg-yellow-100 p-4 rounded">
            Belum ada pengaduan.
        </div>
    @endif

</div>
</x-app-layout>