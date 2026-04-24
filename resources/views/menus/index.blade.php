<!DOCTYPE html>
<html>
<head>
    <title>Menu - DapoerAmel</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #fff7ed; color: #3f2305; }
        .navbar { background: #92400e; color: white; padding: 18px 40px; display: flex; justify-content: space-between; align-items: center; }
        .navbar h2 { margin: 0; }
        .navbar a { color: white; text-decoration: none; background: #d97706; padding: 10px 16px; border-radius: 10px; font-weight: bold; }
        .container { max-width: 1150px; margin: 35px auto; padding: 0 20px; }
        .top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .btn { display: inline-block; padding: 9px 14px; border-radius: 8px; color: white; text-decoration: none; border: none; cursor: pointer; font-weight: bold; }
        .btn-add { background: #d97706; }
        .btn-edit { background: #2563eb; }
        .btn-delete { background: #dc2626; }
        .category-title { margin-top: 35px; color: #92400e; border-left: 7px solid #d97706; padding-left: 13px; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; }
        .card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 18px rgba(0,0,0,0.12); }
        .card img { width: 100%; height: 185px; object-fit: cover; background: #fde68a; }
        .card-content { padding: 18px; }
        .card-content h3 { margin: 0 0 8px; color: #b45309; }
        .description { color: #4b5563; font-size: 14px; min-height: 58px; line-height: 1.5; }
        .price { display: inline-block; margin-top: 12px; background: #f59e0b; color: white; padding: 9px 14px; border-radius: 22px; font-weight: bold; }
        .actions { margin-top: 15px; display: flex; gap: 8px; }
        .success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="navbar">
    <h2>🍛 DapoerAmel</h2>
    <a href="/">Dashboard</a>
</div>

<div class="container">
    <div class="top">
        <div>
            <h1>Daftar Menu DapoerAmel</h1>
            <p>Makanan rumahan enak, murah, dan bikin kenyang</p>
        </div>
        <a href="{{ route('menus.create') }}" class="btn btn-add">+ Tambah Menu</a>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

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

                        <div class="actions">
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-edit">Edit</a>

                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin hapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

</body>
</html>