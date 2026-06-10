<!DOCTYPE html>
<html>
<head>
    <title>Menu DapoerAmel</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #fff7ed; color: #3f2305; }

        .navbar {
            background: #92400e;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: #d97706;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
        }

        .container {
            max-width: 1150px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .category-title {
            margin-top: 35px;
            color: #92400e;
            border-left: 7px solid #d97706;
            padding-left: 13px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }

        .card img {
            width: 100%;
            height: 185px;
            object-fit: cover;
            background: #fde68a;
        }

        .card-content {
            padding: 18px;
        }

        h3 { color: #b45309; }

        .description {
            color: #4b5563;
            font-size: 14px;
            min-height: 55px;
        }

        .price {
            display: inline-block;
            background: #f59e0b;
            color: white;
            padding: 9px 14px;
            border-radius: 22px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        input, textarea {
            width: 100%;
            padding: 9px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 11px;
            background: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        /* POPUP */
        #toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #16a34a;
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            z-index: 9999;
            font-weight: bold;
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateX(120%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

<!-- POPUP -->
@if(session('success'))
<div id="toast">
    {{ session('success') }}
</div>
@endif

<div class="navbar">
    <h2>🍛 DapoerAmel</h2>

    <div style="display:flex; gap:10px;">

        @auth
            <a href="{{ route('orders.index') }}">
                Dashboard Admin
            </a>
        @endauth

        <a href="{{ route('cart.index') }}">
            🛒 Keranjang
        </a>

    </div>
</div>

<div class="container">
    <h1>Menu DapoerAmel</h1>
    <p>Pilih menu, tulis catatan, lalu tambahkan ke keranjang.</p>

    @foreach($menus as $category => $items)
        <h2 class="category-title">{{ $category }}</h2>

        <div class="menu-grid">
            @foreach($items as $menu)
                <div class="card">
                    <img src="{{ $menu->image }}" alt="{{ $menu->name }}">

                    <div class="card-content">
                        <h3>{{ $menu->name }}</h3>
                        <p class="description">{{ $menu->description }}</p>
                        <span class="price">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>

                        <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                            @csrf

                            <input type="number" name="quantity" value="1" min="1" required>

                            <!-- 🔥 FIXED TEXTAREA -->
                            <textarea name="note" placeholder="{{ $menu->category == 'Minuman' 
                                ? 'Contoh: dingin / hangat / es / tanpa gula / less sugar' 
                                : 'Contoh: tidak pedas / pedas sedang / pedas banget / sambal pisah / tanpa kecap' }}"></textarea>

                            <button type="submit">+ Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>
setTimeout(() => {
    const toast = document.getElementById('toast');
    if (toast) {
        toast.style.transition = "0.5s";
        toast.style.opacity = "0";
        toast.style.transform = "translateX(120%)";
    }
}, 2500);
</script>

</body>
</html>