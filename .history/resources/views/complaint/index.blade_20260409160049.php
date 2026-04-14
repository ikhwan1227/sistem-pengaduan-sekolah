<x-app-layout>
<div class="max-w-4xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-5">Form Pengaduan</h1>

    @if(session('success'))
        <div class="bg-green-200 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/complaint" enctype="multipart/form-data">  <!-- Tambahkan enctype -->
        @csrf

        <input type="text" name="judul" placeholder="Judul" class="w-full border p-2 mb-3" required>

        <select name="category_id" class="w-full border p-2 mb-3" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
            @endforeach
        </select>

        <textarea name="deskripsi" placeholder="Deskripsi" class="w-full border p-2 mb-3" required></textarea>

        <!-- INPUT FILE gambar -->
        <input type="file" name="image" accept="image/*" class="w-full border p-2 mb-3">

        <button class="bg-blue-500 text-white px-4 py-2">Kirim</button>
    </form>

    <hr class="my-6">

    <h2 class="text-xl font-bold">Histori Pengaduan</h2>

    @foreach($complaints as $c)
        <div class="border p-3 mt-3">
            <h3 class="font-bold">{{ $c->judul }}</h3>

            <!-- TAMBAHKAN INI UNTUK MENAMPILKAN GAMBAR -->
            @if($c->image)
                <img src="{{ asset('storage/' . $c->image) }}" class="mt-2 max-w-xs rounded">
            @endif

            <p>Kategori: {{ $c->category->nama_kategori }}</p>
            <p>{{ $c->deskripsi }}</p>
            <p>Status: <b>{{ $c->status }}</b></p>

            @foreach($c->feedbacks as $f)
                <p class="text-green-600 mt-1">
                    Balasan Admin: {{ $f->pesan }}
                </p>
            @endforeach
        </div>
    @endforeach

</div>
</x-app-layout>