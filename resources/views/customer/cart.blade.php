<!DOCTYPE html>
<html>
<head>
    <title>Keranjang - DapoerAmel</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #fff7ed; color: #3f2305; }
        .container { max-width: 900px; margin: 40px auto; background: white; padding: 30px; border-radius: 18px; box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
        .btn { display: inline-block; padding: 10px 15px; border-radius: 8px; color: white; text-decoration: none; border: none; cursor: pointer; font-weight: bold; }
        .btn-back { background: #6b7280; }
        .btn-delete { background: #dc2626; }
        .btn-checkout { background: #d97706; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #f59e0b; color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        input { width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .total { text-align: right; font-size: 24px; font-weight: bold; color: #b45309; margin-top: 20px; }
        .success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>🛒 Keranjang Pesanan</h1>

    <a href="{{ route('customer.menu') }}" class="btn btn-back">⬅ Kembali ke Menu DapoerAmel</a>

    @if(session('success'))
        <br><br>
        <div class="success">{{ session('success') }}</div>
    @endif

    @if(count($cart) == 0)
        <p>Keranjang masih kosong.</p>
    @else
        <table>
            <tr>
                <th>Menu</th>
                <th>Qty</th>
                <th>Catatan</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>

            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['note'] ?? '-' }}</td>
                    <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="total">
            Total: Rp {{ number_format($total, 0, ',', '.') }}
        </div>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf

            <label>Nomor Meja</label>
            <input type="text" name="table_number" placeholder="Contoh: Meja 5" required>

            <button type="submit" class="btn btn-checkout">Checkout & Bayar</button>
        </form>
    @endif
</div>

</body>
</html>