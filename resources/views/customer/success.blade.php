<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Berhasil - DapoerAmel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #3f2305;
        }

        .container {
            max-width: 750px;
            margin: 60px auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        h1 {
            color: #16a34a;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .box {
            background: #fffbeb;
            padding: 20px;
            border-radius: 14px;
            margin: 25px 0;
            text-align: left;
        }

        .box p {
            font-size: 17px;
            margin: 8px 0;
        }

        .detail-title {
            margin-top: 30px;
            color: #92400e;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
        }

        th {
            background: #f59e0b;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
            text-align: left;
        }

        .total {
            font-size: 24px;
            font-weight: bold;
            color: #b45309;
            text-align: right;
            margin-top: 18px;
        }

        .payment-info {
            background: #fee2e2;
            color: #991b1b;
            padding: 16px;
            border-radius: 12px;
            margin: 25px 0 15px;
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: #d97706;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn:hover {
            background: #92400e;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>✅ Pesanan Berhasil!</h1>

    <p>Terima kasih, pesanan kamu sudah berhasil kami terima ☕🍛</p>

    <div class="box">
        <p><strong>Nomor Pesanan:</strong> #{{ $order->id }}</p>
        <p><strong>Nomor Meja:</strong> {{ $order->table_number }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    </div>

    <h2 class="detail-title">Detail Pesanan</h2>

    <table>
        <tr>
            <th>Menu</th>
            <th>Qty</th>
            <th>Catatan</th>
            <th>Subtotal</th>
        </tr>

        @foreach($order->details as $detail)
            <tr>
                <td>{{ $detail->menu->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->note ?? '-' }}</td>
                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>

    <div class="total">
        Total Pembayaran: Rp {{ number_format($order->total_price, 0, ',', '.') }}
    </div>

    <div class="payment-info">
        <strong>Silakan lanjutkan pembayaran di kasir ya!! 😊</strong>
    </div>

    <p>
        Pesananmu sedang diproses oleh dapur kami 👨‍🍳 <br>
        Sambil menunggu, santai dulu aja ya dan nikmati waktu nongkrongmu~
    </p>

    <p>Selamat menikmati waktu di DapoerAmel ☕✨</p>

    <a href="{{ route('customer.menu') }}" class="btn">Kembali ke Menu</a>
</div>

</body>
</html>