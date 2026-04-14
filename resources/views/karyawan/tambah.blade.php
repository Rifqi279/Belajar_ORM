<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Karyawan</title>
@vite(['resources/css/app.css','resources/js/app.js'])

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
    padding: 16px 24px;
}

.header-bar h2 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

/* Layout */
.container {
    max-width: 500px;
    margin: 40px auto;
    padding: 0 16px;
}

/* Card */
.card {
    background: #fff;
    padding: 28px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.06);
}

/* Back link */
.link-back {
    display: inline-block;
    margin-bottom: 20px;
    font-size: 13px;
    color: #94617C;
    text-decoration: none;
}

.link-back:hover {
    text-decoration: underline;
}

/* Form */
.form-group {
    margin-bottom: 16px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    transition: 0.2s;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #94617C;
}

/* Button */
.btn {
    width: 100%;
    background: #94617C;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}

.btn:hover {
    opacity: 0.9;
}
</style>
</head>

<body>

<div class="header-bar">
    <h2>Tambah Karyawan</h2>
</div>

<div class="container">
    <div class="card">

        <a href="{{ route('karyawan.index') }}" class="link-back">← Kembali</a>

        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama karyawan" required>
            </div>

            <div class="form-group">
                <input type="text" name="posisi" placeholder="Posisi" required>
            </div>

            <div class="form-group">
                <select name="proyek_id">
                    <option value="">Tidak ada proyek</option>
                    @foreach ($proyeks as $pr)
                        <option value="{{ $pr->id }}">
                            {{ $pr->nama_proyek }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>

    </div>
</div>

</body>
</html>