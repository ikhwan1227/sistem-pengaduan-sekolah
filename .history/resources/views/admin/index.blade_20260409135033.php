<x-app-layout>
<div class="max-w-6xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-5 text-white">Dashboard Admin</h1>

    <!-- FILTER -->
    <form method="GET" class="flex gap-3 mb-5">
        <input type="date" name="tanggal" class="border p-2 rounded">

        <select name="category_id" class="border p-2 rounded">
            <option value="">Kategori</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
            @endforeach
        </select>

        <select name="user_id" class="border p-2 rounded">
            <option value="">Siswa</option>
            @foreach($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>

        <button class="bg-blue-500 text-white px-4 rounded">Filter</button>
    </form>

    @if($complaints->isEmpty())
        <p class="text-gray-500">Belum ada pengaduan.</p>
    @endif

    <!-- LIST -->
    @foreach($complaints as $c)
    <div class="border rounded p-4 mb-4 shadow">

        <h2 class="font-bold text-lg">{{ $c->judul }}</h2>
        <p class="text-gray-600">{{ $c->deskripsi }}</p>

        <p class="mt-2">👤 Siswa: {{ $c->user->name }}</p>
        <p>📂 Kategori: {{ $c->category->nama_kategori }}</p>

        <!-- STATUS BADGE -->
        <p class="mt-2">
            Status:
            <span class="px-2 py-1 rounded text-white
                @if($c->status == 'pending') bg-yellow-500
                @elseif($c->status == 'diproses') bg-blue-500
                @else bg-green-500
                @endif
            ">
                {{ $c->status }}
            </span>
        </p>

        <!-- AKSI -->
        <div class="mt-3 flex flex-wrap gap-2">

            <!-- UPDATE STATUS -->
            <form method="POST" action="/admin/status/{{ $c->id }}">
                @csrf
                <select name="status" class="border p-1 rounded">
                    <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diproses" {{ $c->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $c->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
            </form>

            <form method="POST" action="/admin/feedback/{{ $c->id }}" class="mt-2">
                @csrf

                <input 
                    type="text" 
                    name="pesan" 
                    placeholder="Tulis feedback..." 
                    class="border p-2 rounded"
                >

                <button class="bg-purple-500 text-white px-3 py-1 rounded">
                    Kirim
                </button>
            </form>

            <!-- FEEDBACK -->
            @foreach($c->feedbacks as $f)
                <p class="text-green-600 mt-1">
                    {{ $f->pesan }}
                </p>
            @endforeach

            <!-- HAPUS -->
            <form method="POST" action="/admin/delete/{{ $c->id }}" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
            </form>

        </div>

    </div>
    @endforeach

</div>
</x-app-layout>