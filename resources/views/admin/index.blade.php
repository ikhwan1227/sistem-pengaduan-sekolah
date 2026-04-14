<x-app-layout>
<div class="max-w-6xl mx-auto mt-10 px-4">

    <h1 class="text-2xl font-bold mb-5 text-white">Dashboard Admin</h1>

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
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-3">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="border p-2 rounded">
            
            <select name="category_id" class="border p-2 rounded">
                <option value="">Semua Kategori</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ request('category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->nama_kategori }}
                    </option>
                @endforeach
            </select>
            
            <select name="user_id" class="border p-2 rounded">
                <option value="">Semua Siswa</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
                        {{ $u->name }}
                    </option>
                @endforeach
            </select>
            
            <button class="bg-blue-500 text-white px-4 rounded hover:bg-blue-600 transition">Filter</button>
            
            @if(request()->anyFilled(['tanggal', 'category_id', 'user_id']))
                <a href="{{ route('admin.index') }}" class="bg-gray-500 text-white px-4 rounded hover:bg-gray-600 transition">Reset</a>
            @endif
        </form>
    </div>

    @if($complaints->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
            Belum ada pengaduan.
        </div>
    @endif

    <!-- LIST COMPLAINTS -->
    @foreach($complaints as $c)
    <div class="bg-white rounded-lg shadow-md p-4 mb-4 hover:shadow-lg transition">
        
        <div class="flex justify-between items-start">
            <h2 class="font-bold text-xl text-gray-800">{{ $c->judul }}</h2>
            
            <!-- STATUS BADGE -->
            <span class="px-3 py-1 rounded-full text-white text-sm font-semibold
                @if($c->status == 'pending') bg-yellow-500
                @elseif($c->status == 'diproses') bg-blue-500
                @else bg-green-500
                @endif
            ">
                {{ ucfirst($c->status) }}
            </span>
        </div>
        
        <p class="text-gray-600 mt-2">{{ $c->deskripsi }}</p>
        
        @if($c->image)
            <img src="{{ asset('storage/' . $c->image) }}" class="mt-2 max-w-xs rounded shadow">
        @endif
        
        <div class="mt-3 text-sm text-gray-500">
            <p>👤 Siswa: <span class="font-medium">{{ $c->user->name }}</span></p>
            <p>📂 Kategori: <span class="font-medium">{{ $c->category->nama_kategori }}</span></p>
            <p>📅 Tanggal: <span class="font-medium">{{ \Carbon\Carbon::parse($c->tanggal)->format('d/m/Y') }}</span></p>
        </div>

        <!-- FEEDBACK SECTION -->
        @if($c->feedbacks->count() > 0)
            <div class="mt-3 bg-gray-50 rounded p-3">
                <p class="font-semibold text-sm text-gray-700">💬 Feedback Admin:</p>
                @foreach($c->feedbacks as $f)
                    <p class="text-green-600 text-sm mt-1">• {{ $f->pesan }} 
                        <span class="text-gray-400 text-xs">({{ \Carbon\Carbon::parse($f->tanggal)->format('d/m/Y H:i') }})</span>
                    </p>
                @endforeach
            </div>
        @endif

        <!-- AKSI -->
        <div class="mt-4 flex flex-wrap gap-2 border-t pt-4">
            
            <!-- UPDATE STATUS -->
            <form method="POST" action="/admin/status/{{ $c->id }}" class="flex gap-2">
                @csrf
                <select name="status" class="border p-2 rounded text-sm">
                    <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                    <option value="diproses" {{ $c->status == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                    <option value="selesai" {{ $c->status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                </select>
                <button class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600 transition">
                    Update Status
                </button>
            </form>

            <!-- FEEDBACK FORM -->
            <form method="POST" action="/admin/feedback/{{ $c->id }}" class="flex gap-2">
                @csrf
                <input type="text" name="pesan" placeholder="Tulis feedback..." class="border p-2 rounded text-sm w-64">
                <button class="bg-purple-500 text-white px-3 py-1 rounded text-sm hover:bg-purple-600 transition">
                    Kirim Feedback
                </button>
            </form>

            <!-- HAPUS -->
            <form method="POST" action="/admin/delete/{{ $c->id }}" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition">
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