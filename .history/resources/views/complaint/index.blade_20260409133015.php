<x-app-layout>
<div class="max-w-4xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-5">Form Pengaduan</h1>

    @if(session('success'))
        <div class="bg-green-200 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/complaint">
        @csrf

        <input type="text" name="judul" placeholder="Judul" class="w-full border p-2 mb-3" required>

        <select name="category_id"class="w-full border p-2 mb-3">
            <option value="">Pilih Kategori</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
            @endforeach
        </select>

        <textarea name="deskripsi" placeholder="Deskripsi" class="w-full border p-2 mb-3"></textarea>

        <button class="bg-blue-500 text-white px-4 py-2">Kirim</button>
    </form>

    <hr class="my-6">

    <h2 class="text-xl font-bold">Histori Pengaduan</h2>

    @foreach($complaints as $c)
        <div class="border p-3 mt-3">
            <h3 class="font-bold">{{ $c->judul }}</h3>
            {{ $c->category->nama_kategori }}
            <p>{{ $c->deskripsi }}</p>
            <p>Status: <b>{{ $c->status }}</b></p>
        </div>
    @endforeach

</div>
</x-app-layout>