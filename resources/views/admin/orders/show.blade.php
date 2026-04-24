<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan - DapoerAmel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #3f2305;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        h1 {
            color: #b45309;
        }

        .info {
            background: #fffbeb;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .info p {
            margin: 8px 0;
            font-size: 17px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #f59e0b;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .total {
            text-align: right;
            font-size: 24px;
            font-weight: bold;
            color: #b45309;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('orders.index') }}" class="btn"> ⬅ Kembali ke Daftar Pesanan</a>

    <h1>Detail Pesanan #{{ $order->id }}</h1>

    <div class="info">
        <p><strong>Nomor Meja:</strong> {{ $order->table_number }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Waktu Pesan:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
    </div>

    <table>
        <tr>
            <th>Menu</th>
            <th>Qty</th>
            <th>Catatan</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>

        @foreach($order->details as $detail)
            <tr>
                <td>{{ $detail->menu->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->note ?? '-' }}</td>
                <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>

    <div class="total">
        Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}
    </div>
</div>

</body>
</html>