<!DOCTYPE html>
<html>
<head>
    <title>Test Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="p-8">
        <div class="bg-blue-500 text-white p-4 rounded-lg mb-4">
            <h1 class="text-2xl font-bold">TEST DASHBOARD ADMIN</h1>
            <p>Jika halaman ini muncul, maka route admin berfungsi.</p>
        </div>
        
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold mb-2">Data dari Controller:</h2>
            <p>Total Pengaduan: <strong>{{ $totalAll ?? 'Tidak ada data' }}</strong></p>
            <p>Jumlah Complaints: <strong>{{ isset($complaints) ? $complaints->count() : 'Tidak ada' }}</strong></p>
        </div>
    </div>
</body>
</html>