<!DOCTYPE html>
<html>
<head>
    <title>Input Transaksi - DapoerAmel</title>

    <style>
        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#fff7ed;
            color:#3f2305;
        }

        .container{
            max-width:700px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,0.12);
        }

        h1{
            color:#b45309;
        }

        label{
            font-weight:bold;
        }

        input,
        select,
        textarea{
            width:100%;
            padding:12px;
            margin-top:6px;
            margin-bottom:18px;
            border:1px solid #ddd;
            border-radius:8px;
            box-sizing:border-box;
        }

        textarea{
            height:90px;
        }

        .btn{
            display:inline-block;
            padding:12px 18px;
            border:none;
            border-radius:8px;
            color:white;
            text-decoration:none;
            font-weight:bold;
            cursor:pointer;
        }

        .btn-back{
            background:#6b7280;
        }

        .btn-save{
            background:#d97706;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Input Transaksi</h1>

    <a href="{{ route('orders.index') }}" class="btn btn-back">
        Kembali
    </a>

    <br><br>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <label>Nomor Meja</label>
        <input type="text" name="table_number" required>

        <label>Pilih Menu</label>
        <select name="menu_id" required>
            @foreach($menus as $menu)
                <option value="{{ $menu->id }}">
                    {{ $menu->name }} - Rp {{ number_format($menu->price,0,',','.') }}
                </option>
            @endforeach
        </select>

        <label>Jumlah</label>
        <input type="number" name="quantity" min="1" value="1" required>

        <label>Catatan</label>
        <textarea name="note"></textarea>

        <button type="submit" class="btn btn-save">
            Simpan Transaksi
        </button>
    </form>

</div>

</body>
</html>