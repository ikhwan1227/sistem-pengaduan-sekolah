<x-app-layout>
<div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">

    {{-- ================= HEADER ================= --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard Admin</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Kelola dan pantau semua pengaduan siswa</p>
    </div>

    {{-- ================= STATS CARD (Seperti Dashboard Siswa) ================= --}}
    @php
        $totalAll = $complaints->count();
        $totalDiproses = $complaints->where('status', 'diproses')->count();
        $totalSelesai = $complaints->where('status', 'selesai')->count();
        $totalPending = $complaints->where('status', 'pending')->count();
        $totalBulanIni = $complaints->filter(function($c) {
            return $c->tanggal->month == now()->month && $c->tanggal->year == now()->year;
        })->count();
    @endphp

    {{-- ================= STATS CARD ================= --}}
@php
    $totalAll = $complaints->count();
    $totalDiproses = $complaints->where('status', 'diproses')->count();
    $totalSelesai = $complaints->where('status', 'selesai')->count();
    $totalPending = $complaints->where('status', 'pending')->count();
    $totalDitolak = $complaints->where('status', 'ditolak')->count();
    
    // Perbaikan: Parse tanggal dengan Carbon
    $totalBulanIni = $complaints->filter(function($c) {
        $tanggal = \Carbon\Carbon::parse($c->tanggal);
        return $tanggal->month == now()->month && $tanggal->year == now()->year;
    })->count();
@endphp

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 mb-6">
    <!-- Total -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] text-gray-500 dark:text-gray-400">Total</p>
                <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalAll }}</p>
            </div>
            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
        <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Semua pengaduan</div>
    </div>

    <!-- Bulan Ini -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] text-gray-500 dark:text-gray-400">Bulan Ini</p>
                <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalBulanIni }}</p>
            </div>
            <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">{{ now()->format('F Y') }}</div>
    </div>

    <!-- Pending -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] text-gray-500 dark:text-gray-400">Pending</p>
                <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $totalPending }}</p>
            </div>
            <div class="w-8 h-8 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Menunggu diproses</div>
    </div>

    <!-- Diproses -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] text-gray-500 dark:text-gray-400">Diproses</p>
                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $totalDiproses }}</p>
            </div>
            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
        </div>
        <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Sedang ditangani</div>
    </div>

    <!-- Selesai -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] text-gray-500 dark:text-gray-400">Selesai</p>
                <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $totalSelesai }}</p>
            </div>
            <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Telah selesai</div>
    </div>

    <!-- Ditolak -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-3 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] text-gray-500 dark:text-gray-400">Ditolak</p>
                <p class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $totalDitolak }}</p>
            </div>
            <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-1 text-[9px] text-gray-400 dark:text-gray-500">Tidak diproses</div>
    </div>
</div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))
        <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow">
            <div class="flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('alert-success').style.display='none'" class="text-green-700">&times;</button>
            </div>
        </div>
    @endif

    <!-- FILTER CARD -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-6 border border-gray-200 dark:border-gray-700">
        <form method="GET" class="flex flex-wrap gap-3">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded-lg text-sm">
            
            <select name="category_id" class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded-lg text-sm">
                <option value="">Semua Kategori</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->nama_kategori }}
                    </option>
                @endforeach
            </select>
            
            <select name="user_id" class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded-lg text-sm">
                <option value="">Semua Siswa</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
            
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition">Filter</button>
            
            @if(request()->anyFilled(['tanggal', 'category_id', 'user_id']))
                <a href="{{ route('admin.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm transition">Reset</a>
            @endif
        </form>
    </div>

    @if($complaints->isEmpty())
        <div class="bg-yellow-100 dark:bg-yellow-900/30 border-l-4 border-yellow-500 text-yellow-700 dark:text-yellow-400 p-4 rounded">
            Belum ada pengaduan.
        </div>
    @endif

    <!-- LIST COMPLAINTS -->
    @foreach($complaints as $c)
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 mb-4 hover:shadow-lg transition border border-gray-200 dark:border-gray-700">
        
        <div class="flex justify-between items-start">
            <h2 class="font-bold text-xl text-gray-800 dark:text-white">{{ $c->judul }}</h2>
            
            <!-- STATUS BADGE -->
            <span class="px-3 py-1 rounded-full text-white text-sm font-semibold
                @if($c->status == 'pending') bg-yellow-500
                @elseif($c->status == 'diproses') bg-blue-500
                @elseif($c->status == 'selesai') bg-green-500
                @else bg-red-500
                @endif
            ">
                {{ ucfirst($c->status) }}
            </span>
        </div>
        
        <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $c->deskripsi }}</p>
        
        @if($c->image)
            <img src="{{ asset('storage/' . $c->image) }}" class="mt-2 max-w-xs rounded shadow">
        @endif
        
        <div class="mt-3 text-sm text-gray-500 dark:text-gray-400">
            <p>👤 Siswa: <span class="font-medium dark:text-white">{{ $c->user->name }}</span></p>
            <p>📂 Kategori: <span class="font-medium dark:text-white">{{ $c->category->nama_kategori }}</span></p>
            <p>📅 Tanggal: <span class="font-medium dark:text-white">{{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}</span></p>
            @if($c->location)
                <p>📍 Lokasi: <span class="font-medium dark:text-white">{{ $c->location }}</span></p>
            @endif
        </div>

        <!-- FEEDBACK SECTION -->
        @if($c->feedbacks->count() > 0)
            <div class="mt-3 bg-gray-50 dark:bg-gray-700/50 rounded p-3">
                <p class="font-semibold text-sm text-gray-700 dark:text-gray-300">💬 Feedback Admin:</p>
                @foreach($c->feedbacks as $f)
                    <p class="text-green-600 dark:text-green-400 text-sm mt-1">• {{ $f->pesan }} 
                        <span class="text-gray-400 text-xs">({{ \Carbon\Carbon::parse($f->tanggal)->format('d/m/Y H:i') }})</span>
                    </p>
                @endforeach
            </div>
        @endif

        <!-- AKSI -->
        <div class="mt-4 flex flex-wrap gap-2 border-t pt-4 border-gray-200 dark:border-gray-700">
            
            <!-- UPDATE STATUS -->
            <form method="POST" action="/admin/status/{{ $c->id }}" class="flex gap-2">
                @csrf
                <select name="status" class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded text-sm">
                    <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                    <option value="diproses" {{ $c->status == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                    <option value="selesai" {{ $c->status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                </select>
                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm transition">
                    Update Status
                </button>
            </form>

            <!-- FEEDBACK FORM -->
            <form method="POST" action="/admin/feedback/{{ $c->id }}" class="flex gap-2">
                @csrf
                <input type="text" name="pesan" placeholder="Tulis feedback..." class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2 rounded text-sm w-64">
                <button class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded text-sm transition">
                    Kirim Feedback
                </button>
            </form>

            <!-- HAPUS -->
            <form method="POST" action="/admin/delete/{{ $c->id }}" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition">
                    🗑️ Hapus
                </button>
            </form>

        </div>

    </div>
    @endforeach

</div>

<script>
    // Auto hide alert after 3 seconds
    setTimeout(function() {
        let alert = document.getElementById('alert-success');
        if(alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.style.display = 'none', 500);
        }
    }, 3000);
</script>

</x-app-layout>