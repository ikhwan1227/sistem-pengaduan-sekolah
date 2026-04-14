<x-app-layout>
<div class="max-w-4xl mx-auto mt-10 px-4">

    <h1 class="text-2xl font-bold mb-5 text-gray-800">📝 Form Pengaduan</h1>

    @if(session('success'))
        <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow">
            <div class="flex items-center justify-between">
                <span>✅ {{ session('success') }}</span>
                <button onclick="document.getElementById('alert-success').style.display='none'" class="text-green-700">&times;</button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM CARD -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <form method="POST" action="/complaint" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul Pengaduan *</label>
                <input type="text" name="judul" placeholder="Contoh: AC Ruang Kelas Rusak" 
                    class="w-full border rounded-lg p-2 @error('judul') border-red-500 @enderror" 
                    value="{{ old('judul') }}" required>
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Kategori *</label>
                <select name="category_id" class="w-full border rounded-lg p-2 @error('category_id') border-red-500 @enderror" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Deskripsi *</label>
                <textarea name="deskripsi" placeholder="Jelaskan pengaduan secara detail..." 
                    class="w-full border rounded-lg p-2 @error('deskripsi') border-red-500 @enderror" 
                    rows="4" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Foto Pendukung (Opsional)</label>
                <input type="file" name="image" accept="image/*" 
                    class="w-full border rounded-lg p-2 @error('image') border-red-500 @enderror">
                <p class="text-gray-400 text-sm mt-1">Maksimal 2MB, format JPG, PNG, atau GIF</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                📤 Kirim Pengaduan
            </button>
        </form>
    </div>

    <hr class="my-6">

    <h2 class="text-xl font-bold text-gray-800 mb-4">📋 Histori Pengaduan Saya</h2>

    @forelse($complaints as $c)
        <div class="bg-white rounded-lg shadow-md p-4 mb-4">
            <div class="flex justify-between items-start">
                <h3 class="font-bold text-lg text-gray-800">{{ $c->judul }}</h3>
                <span class="px-2 py-1 rounded-full text-white text-xs font-semibold
                    @if($c->status == 'pending') bg-yellow-500
                    @elseif($c->status == 'diproses') bg-blue-500
                    @else bg-green-500
                    @endif
                ">
                    {{ ucfirst($c->status) }}
                </span>
            </div>
            
            <p class="text-gray-500 text-sm mt-1">Kategori: {{ $c->category->nama_kategori }}</p>
            <p class="text-gray-600 mt-2">{{ $c->deskripsi }}</p>
            
            @if($c->image)
                <img src="{{ asset('storage/' . $c->image) }}" class="mt-2 max-w-xs rounded shadow">
            @endif
            
            @if($c->feedbacks->count() > 0)
                <div class="mt-3 bg-green-50 rounded p-3">
                    <p class="font-semibold text-sm text-green-700">💬 Balasan Admin:</p>
                    @foreach($c->feedbacks as $f)
                        <p class="text-green-600 text-sm mt-1">• {{ $f->pesan }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    @empty
        <div class="bg-gray-100 rounded-lg p-4 text-center text-gray-500">
            Belum ada pengaduan. Buat pengaduan pertama Anda!
        </div>
    @endforelse

</div>

<script>
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