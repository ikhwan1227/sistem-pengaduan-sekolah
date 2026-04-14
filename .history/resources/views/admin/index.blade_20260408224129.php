<x-app-layout>
<div class="max-w-6xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-5">Dashboard Admin</h1>

    <!-- FILTER -->
    <form method="GET" class="flex gap-3 mb-5">
        <input type="date" name="tanggal" class="border p-2">

        <select name="category_id" class="border p-2">
            <option value="">Kategori</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
            @endforeach
        </select>

        <select name="user_id" class="border p-2">
            <option value="">Siswa</option>
            @foreach($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>

        <button class="bg-blue-500 text-white px-4">Filter</button>
    </form>

    <!-- LIST -->
    @foreach($complaints as $c)
    <div class="border p-4 mb-4">

        <h2 class="font-bold">{{ $c->judul }}</h2>
        <p>{{ $c->deskripsi }}</p>

        <p>Siswa: {{ $c->user->name }}</p>
        <p>Kategori: {{ $c->category->nama_kategori }}</p>
        <p>Status: <b>{{ $c->status }}</b></p>

        <!-- UPDATE STATUS -->
        <form method="POST" action="/status/{{ $c->id }}" class="mt-2">
            @csrf
            <select name="status" class="border p-1">
                <option value="pending">Pending</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
            </select>
            <button class="bg-green-500 text-white px-2">Update</button>
        </form>

        <!-- FEEDBACK -->
        <form method="POST" action="/feedback/{{ $c->id }}" class="mt-2">
            @csrf
            <input type="text" name="pesan" placeholder="Feedback..." class="border p-1 w-1/2">
            <button class="bg-purple-500 text-white px-2">Kirim</button>
        </form>

    </div>
    @endforeach

</div>
</x-app-layout>