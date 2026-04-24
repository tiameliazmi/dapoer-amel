<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu - DapoerAmel</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #fff7ed; color: #3f2305; }
        .container { max-width: 650px; margin: 40px auto; background: white; padding: 30px; border-radius: 18px; box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
        h1 { color: #b45309; }
        label { font-weight: bold; }
        input, textarea, select { width: 100%; padding: 12px; margin-top: 6px; margin-bottom: 18px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        textarea { height: 90px; }
        .btn { display: inline-block; padding: 12px 18px; border: none; border-radius: 8px; color: white; text-decoration: none; font-weight: bold; cursor: pointer; }
        .btn-back { background: #6b7280; }
        .btn-save { background: #d97706; }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Menu</h1>

    <a href="{{ route('menus.index') }}" class="btn btn-back">Kembali</a>

    <br><br>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <label>Nama Menu</label>
        <input type="text" name="name" required>

        <label>Kategori</label>
        <select name="category" required>
            <option value="Makanan">Makanan</option>
            <option value="Paket Hemat">Paket Hemat</option>
            <option value="Minuman">Minuman</option>
        </select>

        <label>Deskripsi</label>
        <textarea name="description"></textarea>

        <label>Harga</label>
        <input type="number" name="price" required>

        <label>Link Gambar</label>
        <input type="text" name="image">

        <button type="submit" class="btn btn-save">Simpan Menu</button>
    </form>
</div>

</body>
</html>