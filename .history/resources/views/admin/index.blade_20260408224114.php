<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Dashboard Admin</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Siswa</th>
        <th>Kategori</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($complaints as $c)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $c->judul }}</td>
        <td>{{ $c->user->name }}</td>
        <td>{{ $c->category->nama }}</td>
        <td>{{ $c->status }}</td>
        <td>
            <form action="/admin/status/{{ $c->id }}" method="POST">
                @csrf
                <select name="status">
                    <option value="pending">Pending</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>