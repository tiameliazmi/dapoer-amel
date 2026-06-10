<!DOCTYPE html>
<html>
<head>
    <title>Admin Pesanan - DapoerAmel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #3f2305;
        }

        .navbar {
            background: #92400e;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-kanan {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: #d97706;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
        }

        .logout-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        h1 {
            color: #b45309;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
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

        .status {
            background: #fef3c7;
            color: #92400e;
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 8px 13px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2>Admin DapoerAmel</h2>

    <div class="menu-kanan">

        <a href="{{ route('customer.menu') }}">
            Menu Customer
        </a>

        <a href="{{ route('menus.index') }}">
            CRUD Menu
        </a>

        <a href="{{ route('transactions.create') }}">
            Input Transaksi
        </a>

        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>
</div>

<div class="container">
    <h1>Daftar Pesanan Masuk</h1>
    <p>Halaman ini digunakan admin/kasir untuk melihat pesanan customer.</p>

    <table>
        <tr>
            <th>No</th>
            <th>Nomor Pesanan</th>
            <th>Nomor Meja</th>
            <th>Total</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>

        @forelse($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->table_number }}</td>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>
                    <span class="status">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn">
                        Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">
                    Belum ada pesanan masuk.
                </td>
            </tr>
        @endforelse
    </table>
</div>

</body>
</html>