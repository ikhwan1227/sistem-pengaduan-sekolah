@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    
    {{-- Header --}}
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl p-6 mb-6 text-white">
        <h1 class="text-2xl font-bold">Dashboard Admin</h1>
        <p class="text-blue-100 mt-1">Kelola dan pantau semua pengaduan siswa</p>
    </div>

    {{-- Stats Card --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 mb-6">
        <div class="bg-white rounded-xl p-3 shadow">
            <p class="text-xs text-gray-500">Total</p>
            <p class="text-2xl font-bold">{{ $totalAll ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl p-3 shadow">
            <p class="text-xs text-gray-500">Bulan Ini</p>
            <p class="text-2xl font-bold">{{ $totalBulanIni ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl p-3 shadow">
            <p class="text-xs text-gray-500">Pending</p>
            <p class="text-2xl font-bold text-yellow-600">{{ $totalPending ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl p-3 shadow">
            <p class="text-xs text-gray-500">Diproses</p>
            <p class="text-2xl font-bold text-blue-600">{{ $totalDiproses ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl p-3 shadow">
            <p class="text-xs text-gray-500">Selesai</p>
            <p class="text-2xl font-bold text-green-600">{{ $totalSelesai ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-xl p-3 shadow">
            <p class="text-xs text-gray-500">Ditolak</p>
            <p class="text-2xl font-bold text-red-600">{{ $totalDitolak ?? 0 }}</p>
        </div>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-3">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border rounded-lg p-2">
            <select name="category_id" class="border rounded-lg p-2">
                <option value="">Semua Kategori</option>
                @foreach($categories ?? [] as $c)
                    <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->nama_kategori }}
                    </option>
                @endforeach
            </select>
            <select name="user_id" class="border rounded-lg p-2">
                <option value="">Semua Siswa</option>
                @foreach($users ?? [] as $u)
                    <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Filter</button>
            @if(request()->anyFilled(['tanggal', 'category_id', 'user_id']))
                <a href="{{ route('admin.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Reset</a>
            @endif
        </form>
    </div>

    {{-- List Pengaduan --}}
    @if(isset($complaints) && $complaints->count() > 0)
        @foreach($complaints as $c)
        <div class="bg-white rounded-xl shadow p-4 mb-3">
            <div class="flex justify-between items-start">
                <h3 class="font-bold text-lg">{{ $c->judul }}</h3>
                <span class="px-2 py-1 rounded-full text-xs font-semibold
                    @if($c->status == 'pending') bg-yellow-100 text-yellow-700
                    @elseif($c->status == 'diproses') bg-blue-100 text-blue-700
                    @elseif($c->status == 'selesai') bg-green-100 text-green-700
                    @else bg-red-100 text-red-700
                    @endif">
                    {{ ucfirst($c->status) }}
                </span>
            </div>
            <p class="text-gray-600 text-sm mt-2">{{ $c->deskripsi }}</p>
            
            @if($c->image)
                <img src="{{ asset('storage/' . $c->image) }}" class="mt-2 w-32 h-24 object-cover rounded">
            @endif
            
            <div class="flex flex-wrap gap-3 mt-3 text-xs text-gray-400">
                <span>👤 {{ $c->user->name ?? '-' }}</span>
                <span>📂 {{ $c->category->nama_kategori ?? '-' }}</span>
                <span>📅 {{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}</span>
                @if($c->location)
                    <span>📍 {{ $c->location }}</span>
                @endif
            </div>
            
            {{-- Feedback --}}
            @if($c->feedbacks->count() > 0)
                <div class="mt-3 bg-green-50 rounded-lg p-2">
                    <p class="text-xs font-semibold text-green-700">💬 Feedback Admin:</p>
                    <p class="text-sm text-green-600">{{ $c->feedbacks->last()->pesan }}</p>
                </div>
            @endif
            
            {{-- Aksi --}}
            <div class="flex flex-wrap gap-2 mt-3 pt-3 border-t">
                <form method="POST" action="/admin/status/{{ $c->id }}" class="flex gap-2">
                    @csrf
                    <select name="status" class="border rounded p-1 text-sm">
                        <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $c->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $c->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Update</button>
                </form>
                
                <form method="POST" action="/admin/feedback/{{ $c->id }}" class="flex gap-2">
                    @csrf
                    <input type="text" name="pesan" placeholder="Tulis feedback..." class="border rounded p-1 text-sm w-48">
                    <button class="bg-purple-500 text-white px-3 py-1 rounded text-sm">Kirim</button>
                </form>
                
                <form method="POST" action="/admin/delete/{{ $c->id }}" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    @else
        <div class="bg-yellow-100 rounded-xl p-6 text-center">
            <p class="text-yellow-700">Belum ada pengaduan.</p>
        </div>
    @endif

</div>
@endsection