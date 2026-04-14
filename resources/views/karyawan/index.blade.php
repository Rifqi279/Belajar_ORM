<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name', 'Karyawan') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
body {
    background: #FAFAFA;
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
}

/* Header */
.header-bar {
    background: #94617C;
    color: #fff;
    padding: 14px 22px;
}

.header-bar h2 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

/* Layout */
.container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 16px;
}

/* Card & Table */
.card,
.table-wrapper {
    background: #fff;
    border-radius: 10px;
    padding: 22px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

/* Toolbar */
.toolbar {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

/* Button */
.btn {
    background: #94617C;
    color: #fff;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    border: none;
    cursor: pointer;
}

.btn:hover {
    opacity: 0.8;
}

.btn-alt {
    background: #eee;
    color: #555;
}

/* Search */
.search-form {
    display: flex;
    gap: 8px;
}

.search-form input {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

thead {
    background: #94617C;
    color: #fff;
}

th,
td {
    padding: 10px;
}

tbody tr {
    border-bottom: 1px solid #eee;
}

tbody tr:hover {
    background: #f7f3f5;
}

/* Badge */
.badge {
    padding: 3px 8px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 600;
}

.badge-success {
    background: #e6f4ea;
    color: #2e7d32;
}

.badge-danger {
    background: #fdecea;
    color: #c62828;
}

/* Actions */
.link-edit {
    color: #94617C;
    text-decoration: none;
    font-weight: 600;
}

.btn-hapus {
    background: none;
    border: none;
    color: #c62828;
    cursor: pointer;
}

/* Misc */
.footer-info {
    font-size: 12px;
    color: #888;
    text-align: right;
    margin-top: 10px;
}

.empty-row td {
    text-align: center;
    color: #aaa;
    padding: 25px;
}
</style>
</head>

<body>
<div class="header-bar">
    <h2>Manajemen Karyawan</h2>
</div>

<div class="container">

<div class="toolbar">
    <a href="{{ route('karyawan.tambah') }}" class="btn">+ Tambah</a>

    <form action="{{ route('karyawan.index') }}" method="GET" class="search-form">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari..">
        <button class="btn">Cari</button>
        @if ($search)
            <a href="{{ route('karyawan.index') }}" class="btn btn-alt">Reset</a>
        @endif
    </form>
</div>

@if ($search)
<p>Hasil: <b>{{ $search }}</b> ({{ $karyawan->count() }})</p>
@endif

<div class="table-wrapper">
<table>
<thead>
<tr>
<th>ID</th>
<th>Nama</th>
<th>Posisi</th>
<th>Proyek</th>
<th>Deadline</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
@forelse ($karyawan as $p)
<tr>
<td>{{ $p->id }}</td>
<td>{{ $p->nama }}</td>
<td>{{ $p->posisi }}</td>
<td>{{ $p->proyek->nama_proyek ?? '-' }}</td>
<td>{{ $p->proyek->deadline ?? '-' }}</td>

<td>
@if ($p->proyek && $p->proyek->status == 'Selesai')
<span class="badge badge-success">Selesai</span>
@elseif ($p->proyek && $p->proyek->status == 'Belum')
<span class="badge badge-danger">Belum</span>
@else
-
@endif
</td>

<td>
<a href="/karyawan/{{ $p->id }}" class="link-edit">Edit</a>

<form action="{{ route('karyawan.delete',['id'=>$p->id]) }}" method="POST" style="display:inline;">
@csrf
<input type="hidden" name="_method" value="DELETE">
<button class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</button>
</form>
</td>
</tr>

@empty
<tr class="empty-row">
<td colspan="7">Tidak ada data</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<p class="footer-info">Total: {{ $karyawan->count() }}</p>
</div>
</body>
</html>